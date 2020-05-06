<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Upload;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use Storage;

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
//		$convertedFiles = array(
//			'9PJX1Pqj6cf4lbQGohoUA5Smq1z4g8VDcEETIBZx.mkv',
//			'9PJX1Pqj6cf4lbQGohoUA5Smq1z4g8VDcEETIBZx.webm',
//			'XueCR1uy5cw8RQZjFpS2jGY3rFhFsEzcwMT0ZTVz.mkv',
//			'XueCR1uy5cw8RQZjFpS2jGY3rFhFsEzcwMT0ZTVz.webm',
//			'A1tdFxh4AK2kJKpV9GO65BAuq12KjdHkBWbIDMjV.mkv',
//			'A1tdFxh4AK2kJKpV9GO65BAuq12KjdHkBWbIDMjV.webm',
//			'uakcE5q0szfHsOImeHKqaU0hjFm5uZfDKzoVgDIr.mkv',
//			'uakcE5q0szfHsOImeHKqaU0hjFm5uZfDKzoVgDIr.webm',
//		);
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
		}

    }
}
