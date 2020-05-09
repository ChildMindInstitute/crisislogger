<?php

namespace App\Console\Commands;

use App\Transcription;
use App\Upload;
use Illuminate\Console\Command;

class Syncuserupload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:user-uploads';

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
        //
        $uploads = Upload::with('transcript')->get();
        foreach ($uploads as $upload)
        {
            $transaction = Transcription::where('upload_id', $upload->getKey())->first();
            if ($transaction)
            {
                if (isset($upload->user_id))
                {
                    $transaction->user_id = $upload->user_id;
                    $transaction->update();
                }

            }
        }
        $uploads = Upload::where('status', 'processing')->get();
        foreach ($uploads as $upload)
        {
            $transaction = Transcription::where('upload_id', $upload->getKey())->first();
            if ($transaction)
            {
                if (isset($upload->user_id))
                {
                    $upload->status = 'finished';
                    $upload->update();
                }

            }
        }

    }
}
