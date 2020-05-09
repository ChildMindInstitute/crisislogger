<?php

namespace App\Console\Commands;

use App\Jobs\VideoConversionJob;
use Illuminate\Console\Command;
use App\Upload;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use Storage;
use Illuminate\Support\Facades\DB;
class ConvertVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:video-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (app()->environment('convert'))
        {
            DB::setDefaultConnection('mysql_prod');
            $uploads = Upload::where('video_generated', false)->where('converted', false)->get();

            if(count($uploads) > 0)
            {
                foreach($uploads as $upload)
                {
                    $exists = Storage::disk('gcs')->has($upload->name);
                    if(!$exists)
                    {
                        continue;
                    }
                    $file_name = $upload->name;
                    if(strpos($file_name, "mkv") === false &&  strpos( $file_name, "webm") === false)
                    {
                        continue;
                    }

                    echo $file_name."\n";
                    $format = new \FFMpeg\Format\Video\X264('libfdk_aac', 'libx264');
                    $name = str_replace(['.mkv', '.webm'], '', $file_name).".mp4";
                    try {
                        FFMpeg::fromDisk('gcs')
                            ->open($file_name)
                            ->addFilter('-codec', 'copy')
                            ->export()
                            ->toDisk('gcs')
                            ->inFormat( $format)
                            ->save($name);
                        $upload->name = $name;
                        $upload->converted = true;
                        $upload->update();
                    }
                    catch (\Exception $exception)
                    {
                        echo $exception->getMessage();
                        echo 'FFmpeg conversion failed: '.$file_name."\n";
                        \Log::error('FFmpeg conversion failed: '.$file_name);
                    }

                }
            }
            $notTransUploads  = Upload::with('transcript')->where('converted', false)->get();
            foreach ($notTransUploads as $notTransUpload)
            {
                if (isset($notTransUpload->transcript->id) && isset($notTransUpload->transcript->user_id)  )
                {
                    continue;
                }
                if (isset($notTransUpload->transcript->id) && !isset($notTransUpload->transcript->user_id))
                {
                    $notTransUpload->transcript->user_id = $notTransUpload->user_id;
                    $notTransUpload->transcript->update();
                }
                if (!isset($notTransUpload->transcript->id))
                {
                    \Illuminate\Support\Facades\Queue::push(new VideoConversionJob($notTransUpload, 'prod'));
                }
            }
        }
    }
}
