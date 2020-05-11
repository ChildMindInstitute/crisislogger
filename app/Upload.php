<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;
use Storage;

/**
 * Class Upload
 * @package App
 * @mixin Eloquent
 * @property int id
 * @property string name
 * @property int user_id
 * @property int share
 * @property int contribute_to_science
 * @property boolean video_generated
 * @property boolean audio_generated
 * @property string  status
 * @property string voice
 * @property string original_file_name
 * @property string recorded_date
 * @property integer video_id
 * @property CarbonImmutable created_at
 */
class Upload extends Model
{
    protected $appends = [
	    'link'
    ];

    /**
     * @return string
     */
    public function getLinkAttribute()
    {
        $name = str_replace('/storage/', '', $this->name);
        return 'https://storage.googleapis.com/crisislogger_uploads' . config('app.google_cloud_buck') . "/$name";
    }

    /**
     * Convert a video to an audio file so we can use transcription.
     * @return Upload
     */
    public function convertToAudio(){
        $name = str_replace(['.mkv', '.webm', '.mp4'], '', $this->name);
        FFMpeg::fromDisk('gcs')
            ->open($this->name)
              ->addFilter('-ac', 1)
            ->export()
            ->toDisk('gcs')
            ->inFormat(new \FFMpeg\Format\Audio\Wav)
            ->save($name . '.wav');
        // create a new upload for the audio
        $upload = new Upload();
        $upload->user_id = $this->user_id;
        $upload->contribute_to_science = $this->contribute_to_science;
        $upload->name = $name . '.wav';
        $upload->share = $this->share;
        $upload->created_at = $this->created_at;
	    $upload->voice = $this->voice;
	    $upload->recorded_date = $this->recorded_date;
	    $upload->video_id = $this->id;
	    $upload->video_generated = true;
        $upload->save();
        $this->audio_generated = true;
        $this->update();
        return $upload;
    }
    public function transcript()
    {
        return $this->hasOne(Transcription::class, 'upload_id');
    }
}
