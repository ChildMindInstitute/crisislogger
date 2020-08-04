<?php

namespace App\Http\Controllers;

use App\Texts;
use App\Upload;
use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Storage;
use App\Transcription;
use Illuminate\Http\Request;

class TranscribeController extends Controller {
    public function __construct()
    {
        $this->middleware('auth')->only('userTranscription');
    }

    public function index(Request $request) {
		$searchTxt = $request->searchTxt;
        $transcriptions = Transcription::select(['name', 'transcriptions.text as text', 'uploads.share as share', 'uploads.hide as hide','converted', 'uploads.id' ,'uploads.created_at'])->leftJoin('uploads', 'uploads.id', '=', 'transcriptions.upload_id')
            ->where('uploads.hide', '=', '0')
            ->where('uploads.video_generated', '=', '0')
            ->where('uploads.share', '>', '0');
        $texts = Texts::select(\DB::raw('"null" as name, text, share, hide, false as converted,  (id+ "-text") as id, created_at'))
            ->where('hide', '=', '0')
            ->where('share', '>', '0');

        $data = $transcriptions->union($texts)
            ->orderBy('converted', 'DESC')
            ->orderBy('share', 'ASC')
            ->get();
        if (strlen($searchTxt)) {
            $data = $data->filter(function($record) use ($searchTxt){
                if (strlen($searchTxt))
                {
                    return (strpos(\Crypt::decrypt($record->name),$searchTxt) !== false) ? $record : null;
                }
            });
        }
        $count = count($data);
        $page = (request('page'))?:1;
        $rpp =  8; //(request('perPage'))?:50;
        $offset = $rpp * ($page - 1);
        $paginator = new LengthAwarePaginator($data->slice($offset,$rpp),$count,$rpp,$page,[
            'path'  => $request->url(),
            'query' => $request->query(),
        ]);
        $data = $paginator;
		return $data;
	}
	public function userTranscription(Request $request)
    {

        $uploads = Upload::with('transcript')->where('user_id', \Auth::user()->getKey())->paginate(12);
        return \response()->json($uploads);
    }
}
