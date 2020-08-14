<?php

namespace App\Http\Controllers;

use App\Http\Resources\TranscriptsResource;
use App\Texts;
use App\Upload;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Storage;
use App\Transcription;
use Illuminate\Http\Request;
use function foo\func;

class TranscribeController extends Controller {
    public function __construct()
    {
        $this->middleware('auth')->only('userTranscription');
    }

    public function index(Request $request) {
		$searchTxt = $request->searchTxt;
        $transcriptions = Transcription::select(['name', 'transcriptions.text as text', 'published', 'rank', 'uploads.share as share', 'transcriptions.encrypted as encrypted', 'uploads.hide as hide','converted', 'uploads.id' ,'uploads.created_at'])->leftJoin('uploads', 'uploads.id', '=', 'transcriptions.upload_id')
            ->where('uploads.hide', '=', '0')
            ->where('uploads.video_generated', '=', '0')
            ->where('uploads.share', '>', '0');
        $texts = Texts::select(\DB::raw('"null" as name, text, rank, "1" as published, encrypted as encrypted, share, hide, false as converted,  (id+ "-text") as id, created_at'))
            ->where('hide', '=', '0')
            ->where('share', '>', '0');

        $data = $transcriptions->union($texts)
            ->orderBy('converted', 'DESC')
            ->orderBy('rank', 'DESC')
            ->orderBy('share', 'ASC')
            ->get();
        if (strlen($searchTxt)) {
            $data = $data->filter(function($record) use ($searchTxt){
                if (strlen($searchTxt))
                {
                    return (strpos($record->text,$searchTxt) !== false) ? $record : null;
                }
            });
        }
        $data = $data->map(function ($item) {
            if (!$item->published)
            {
                $item->text = '';
            }
           return new TranscriptsResource($item);
        });
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        //Create a new Laravel collection from the array data
        $collection = new Collection($data);
        //Define how many items we want to be visible in each page
        $per_page = 8;
        //Slice the collection to get the items to display in current page
        $currentPageResults = $collection->slice(($currentPage - 1) * $per_page, $per_page)->values();

        $data = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);
        return $data;
	}
	public function userTranscription(Request $request)
    {

        $uploads = Upload::with('transcript')->where('user_id', \Auth::user()->getKey())->paginate(12);
        return \response()->json($uploads);
    }
    private static function decryptPureSQLData($string)
    {
        if (!strlen($string))
        {
            return '';
        }
        else
        {
            return \Crypt::decrypt($string);
        }
    }
}
