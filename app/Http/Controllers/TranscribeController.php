<?php

namespace App\Http\Controllers;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Illuminate\Http\Response;
use Storage;
use App\Transcription;
class TranscribeController extends Controller
{
	public function index() {
		return Transcription::leftJoin('uploads', 'uploads.id', '=', 'transcriptions.upload_id')
			->where('uploads.share', '>', '0')
			->where('uploads.hide', '=', '0')
			->orderBy('transcriptions.id', 'DESC')
			->select('uploads.*', 'transcriptions.*')
			->paginate(8);
	}
}
