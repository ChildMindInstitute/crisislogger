<?php

namespace App\Jobs;

use App\Transcription;
use App\Upload;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VideoConversionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $upload;

    /**
     * Create a new job instance.
     * @param Upload $upload
     * @return void
     */
    public function __construct(Upload $upload)
    {
        //
        $this->upload = $upload;
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!isset($this->upload->id))
        {
            return -1;
        }
        try {
            $upload  = $this->upload->convertToAudio();
            $this->upload->audio_generated = true;
            $this->upload->status = 'finished';
            $this->upload->update();
            Transcription::audio($upload, 1);
        }
        catch (\Exception $exception)
        {
            \Log::error('video conversion failed:  upload id - '.$this->upload->id);
            return -1;
        }
        return 0;
        //
    }
}
