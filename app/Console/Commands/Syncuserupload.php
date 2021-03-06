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
        $uploads = Upload::whereNull('where_from')->get();
        foreach ($uploads as $upload)
        {
            $upload->where_from = 'https://crisislogger.org';
            $upload->update();
        }
    }
}
