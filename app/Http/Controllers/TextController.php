<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Transcription;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TextController extends Controller {

	public function create(Request $request) {
		// Save it in the database
		$upload = new Upload();
		$upload->name = 'text';
		$upload->text = $request->text;
		$upload->share = $request->formshare;
		$upload->contribute_to_science = $request->formcontribute;
		// If we are logged in, save that user's id
		if (Auth::user()) $upload->user_id = Auth::user()->id;

		if ($request->has('formvoice')) {
			$upload->voice = $request->formvoice;
		}

		$upload->save();

		// Check and see if the user needs to be redirected to the questionnaire page (if sharing)
		if ($upload->share) {
			$redirect = route('questionnaire');
		} else {
			$redirect = route('capture-create-account');
		}

		// If the are contributing to science, we will transcribe the message and save it
		if ($upload->contribute_to_science) {
			// if($file_extension == 'wav' || $file_extension == 'mp3'){
			$transcription = Transcription::text($upload);
			// } else {
			//    $transcription = Transcription::video($upload);
			//}
			Session::put('transcription', $transcription->id);
		}


		return redirect($redirect);
//		$response = [
//			'message' => 'File uploaded successfully.',
//			'redirect' => $redirect,
//			'transcription' => $transcription->id ?? null
//		];
//		return response()->json($response, Response::HTTP_OK);
	}

}
