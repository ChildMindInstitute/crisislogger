<?php

namespace App;

use Carbon\CarbonImmutable;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\SpeechClient;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Storage;
use Eloquent;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;


/**
 * Class Transcription
 * @package App
 * @mixin Eloquent
 * @property int id
 * @property int user_id
 * @property int upload_id
 * @property string text
 * @property CarbonImmutable created_at
 * @property CarbonImmutable updated_at
 */
class Transcription extends Model
{
    public const commonWords = array(
        'and',
        'the',
        'I',
        'is',
        'a',
        'an',
        'an',
        'you',
    );
    /**
     * Transcribe an audio file to text.
     * @param Upload $upload
     * @return Transcription
     * @throws ApiException
     * @throws ValidationException
     * @throws FileNotFoundException
     */
    public static function audio(Upload $upload , $audio_channel_count=1){
        $content = Storage::disk('gcs')->get($upload->name);

        # set string as audio content
        try {
            $audio = (new RecognitionAudio())
            #            ->setContent($content);
                ->setUri('gs://crisislogger_uploads/'.$upload->name);
            # The audio file's encoding, sample rate and language
            $config = new RecognitionConfig([
                // 'encoding' => AudioEncoding::LINEAR16,
                // 'sample_rate_hertz' => 44100,
                #           'language_code' => 'en-US'
                'encoding'=>AudioEncoding::LINEAR16,
                'language_code'=>'en-US',
                #        'sample_rate_hertz'=> 44100,
                'audio_channel_count'=> $audio_channel_count
            ]);

            # Instantiates a client
            $client = new SpeechClient(
                [
                    'credentials' => config('app.google_credentials'),
                ]
            );

            # Detects speech in the audio file
            # $google_response = $client->recognize($config, $audio);

            # Print most likely transcription
            #$response = '';
            #foreach ($google_response->getResults() as $result) {
            #    $alternatives = $result->getAlternatives();
            #    $mostLikely = $alternatives[0];
            #    $transcript = $mostLikely->getTranscript();
            #    $response .= $transcript;
            #}

            $operation = $client->longRunningRecognize($config, $audio);
            $operation->pollUntilComplete();

            $response = '';
            if ($operation->operationSucceeded()) {
                $google_response = $operation->getResult();

                # Print most likely transcription
                foreach ($google_response->getResults() as $result) {
                    $alternatives = $result->getAlternatives();
                    $mostLikely = $alternatives[0];
                    $transcript = $mostLikely->getTranscript();
                    $word = explode(' ', $transcript);
                    $word = array_diff($word, self::commonWords);
                    if (count($word) > 0)
                    {
                        $response .= $transcript;
                    }

                }
            }
            else {
                print_r($operation->getError());
            }
            $client->close();

            // If not empty, save into transcriptions table
            $upload_id =  $upload->id;
            if (session()->has('upload_id'))
            {
                $upload_id = session()->get('upload_id');
                session()->forget('upload_id');
            }
            $transcription = new Transcription();
            $transcription->upload_id = $upload_id;
            $transcription->user_id = Auth::check()? Auth::user()->getKey(): null;
            $transcription->text = $response;
            $transcription->save();
            if (!Auth::check())
            {
                session()->put('transaction_id', $transcription->getKey());
            }
            return $transcription;
        }
        catch (\Exception $exception)
        {
            \Log::error('Video transcript error: '.$exception->getMessage());
            return null;
        }
    }

    /**
     * @param Upload $upload
     * @return Transcription
     * @throws ApiException
     * @throws FileNotFoundException
     * @throws ValidationException
     */
    public static function video(Upload $upload){
        // First, convert the video to an audio file.
        $audio_upload = $upload->convertToAudio();
        session()->put('upload_id', $upload->getKey());
        // Call the transcribe audio now to do the transcribing.
        return self::audio($audio_upload,1 );
    }


	public static function text(Upload $upload) {
		$user = Auth::user();

		// If not empty, save into transcriptions table
		$transcription = new Transcription();
		$transcription->upload_id = $upload->id;
		if ($user) $transcription->user_id = $user->id;
		$transcription->text = $upload->text;
		$transcription->save();

		return $transcription;
	}

}
