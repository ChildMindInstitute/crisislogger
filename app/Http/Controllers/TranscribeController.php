<?php

namespace App\Http\Controllers;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Illuminate\Http\Response;
use Storage;
use App\Transcription;
use Illuminate\Http\Request;

class TranscribeController extends Controller {
	public function index(Request $request) {
		$searchTxt = $request->searchTxt;
		$transcriptions = Transcription::leftJoin('uploads', 'uploads.id', '=', 'transcriptions.upload_id')
			->where('uploads.share', '>', '0')
			->where('uploads.hide', '=', '0');
		if ($searchTxt != null) {
			$transcriptions = $transcriptions->leftJoin('users', 'users.id', '=', 'uploads.user_id')
				->where('transcriptions.text', 'like', "%$searchTxt%");
		}
		return $transcriptions->orderBy('uploads.converted', 'DESC')
			->select('uploads.*', 'transcriptions.*')
			->paginate(8);
	}
}