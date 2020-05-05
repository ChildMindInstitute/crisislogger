<?php

namespace App\Http\Controllers;

use App\Transcription;
use App\Upload;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class AdminController extends Controller
{
    private const TEST_USERS = "select id from users where email like '%test%' or email like '%arno%' or email like '%wvanauken%' or email like '%party%' or email like '%worldimpex%' or email like '%ninomatch%'";

    public function __construct()
    {
    }

    public function index() {
        $user = Auth::user();

        $report = DB::select( DB::raw("select d, sum(type not in ('txt', 'wav')) video, sum(type='wav') audio, sum(type='txt') text"
            ." from ("
            ."   select date(created_at) d, substring_index(name, '.', -1) type, user_id from uploads"
            ."   union all"
            ."   select date(created_at) d, 'txt', user_id from text"
            .") t "
            ." where user_id not in (".AdminController::TEST_USERS.")"
            ." group by d"
            ." order by d desc") );

        return view('pages.admin.index', compact('report'));
    }

    public function video(Request $request) {
		// \Log::info("Date: ".$request->date);
		$type = 'video';
        $report = DB::select( DB::raw("select u.id, u.created_at, u.name, t.text, u.hide from uploads u left outer join transcriptions t on t.upload_id=u.id"
            ." where u.user_id not in (".AdminController::TEST_USERS.")"
            ." and u.created_at between ? and adddate(?, interval 1 day)"
            ." and substring_index(u.name, '.', -1) not in ('wav')"
            ." order by u.created_at"), [$request->date, $request->date] );

        return view('pages.admin.list', compact('report', 'type'));
    }

    public function audio(Request $request) {
		$type = 'audio';
        $report = DB::select( DB::raw("select u.id, u.created_at, u.name, t.text, u.hide from uploads u left outer join transcriptions t on t.upload_id=u.id"
            ." where u.user_id not in (".AdminController::TEST_USERS.")"
            ." and u.created_at between ? and adddate(?, interval 1 day)"
            ." and substring_index(u.name, '.', -1) in ('wav')"
            ." order by u.created_at"), [$request->date, $request->date] );

        return view('pages.admin.list', compact('report', 'type'));
    }

    public function text(Request $request) {
		$type = 'text';
        $report = DB::select( DB::raw("select t.id, t.created_at, null name, t.text, null hide from text t"
            ." where t.user_id not in (".AdminController::TEST_USERS.")"
            ." and t.created_at between ? and adddate(?, interval 1 day)"
            ." order by t.created_at"), [$request->date, $request->date] );
        return view('pages.admin.list', compact('report', 'type'));
    }

    public function hide(Request $request) {
        DB::update( DB::raw("update uploads set hide=? where id=?"), [$request->hide, $request->id] );
        return response()->noContent(201);
    }


}
