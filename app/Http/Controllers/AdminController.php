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
    private const DEFAULT_USERS_INCLUDE = "";
    private const DEFAULT_USERS_EXCLUDE = "email like '%test%' or email like '%arno%' or email like '%wvanauken%' or email like '%party%' or email like '%worldimpex%' or email like '%ninomatch%'";
    private const DEFAULT_DATE_FROM = "";
    private const DEFAULT_DATE_TILL = "";
    private const WHERE_STOP_WORDS = [";", "\0", "update", "delete", "drop"];

    private const TEST_USERS = "select id from users where ";

    public function __construct()
    {
    }

    private static function safe_where($s) {
        if(empty($s)) return "";

        $s = trim($s);
        if($s == "") return "";

        $s_lowercase = strtolower($s);
        foreach(AdminController::WHERE_STOP_WORDS as $w) {
            if(FALSE !== strpos($s_lowercase, $w)) {
                return "";
            }
        }
        return $s;
    }

    private static function safe_date($s) {
        if(empty($s)) return "";

        $s = trim($s);
        if($s == "") return "";

        $d = date_create_from_format('Y-m-d', $s);
        if(!$d) return "";

        return $d->format('Y-m-d');
    }

    private static function get($request, $request_name, $safe_handler, $session_name, $default) {
        if($request->has($request_name)) {
            $val = call_user_func($safe_handler, $request->query($request_name));
            Session::put($session_name, $val);
        } else {
            $val = Session::get($session_name, $default);
        }
        return $val;
    }

    public function index(Request $request) {
        // $user = Auth::user();
        $users_include = AdminController::get($request, 'in', 'App\Http\Controllers\AdminController::safe_where', 'admin_users_in', AdminController::DEFAULT_USERS_INCLUDE);
        $users_exclude = AdminController::get($request, 'ex', 'App\Http\Controllers\AdminController::safe_where', 'admin_users_ex', AdminController::DEFAULT_USERS_EXCLUDE);
        $date_from = AdminController::get($request, 'from', 'App\Http\Controllers\AdminController::safe_date', 'admin_date_from', AdminController::DEFAULT_DATE_FROM);
        $date_till = AdminController::get($request, 'till', 'App\Http\Controllers\AdminController::safe_date', 'admin_date_till', AdminController::DEFAULT_DATE_TILL);

        $where_date = " where 1"
            .($date_from? " and created_at >= date('".$date_from."')": "")
            .($date_till? " and created_at < adddate('".$date_till."', 1)": "");

        $report = DB::select( DB::raw("select d,"
            ." group_concat(if(type not in ('txt', 'wav'), id, null) separator '|') video,"
            ." group_concat(if(type='wav', id, null) separator '|') audio,"
            ." group_concat(if(type='txt', id, null) separator '|') text"
            ." from ("
            ."   select date(created_at) d, id, substring_index(name, '.', -1) type, user_id, share as public from uploads".$where_date
            ."   union all"
            ."   select date(created_at) d, id, 'txt', user_id , share  from text".$where_date
            .") t "
            ." where 1"
            .($users_include? " and user_id in (select id from users where ".$users_include.")": "")
            .($users_exclude? " and user_id not in (select id from users where ".$users_exclude.")": "")
            ." OR (user_id IS NULL and   public = 1)"
            ." group by d"
            ." order by d desc") );
        return view('pages.admin.index', compact('report', 'users_include', 'users_exclude', 'date_from', 'date_till'));
    }

    private static function safe_ids(Request $request) {
        // safe string of comma separated integers
        return implode(',', array_map('intval', explode('|', $request->keys()[0])));
    }

    public function video(Request $request) {
        #\Log::info("query: ".AdminController::ids($request));
        $type = 'video';
        $report = DB::select( DB::raw("select u.id, u.created_at, u.name, t.text, u.hide, u.rank"
            ." from uploads u left outer join transcriptions t on t.upload_id=u.id"
            ." where u.id in (".AdminController::safe_ids($request).")"
            ." and substring_index(u.name, '.', -1) not in ('wav')"
            ." order by u.created_at") );

        return view('pages.admin.list', compact('report', 'type'));
    }

    public function audio(Request $request) {
        $type = 'audio';
        $report = DB::select( DB::raw("select u.id, u.created_at, u.name, t.text, u.hide, u.rank"
            ." from uploads u left outer join transcriptions t on t.upload_id=u.id"
            ." where u.id in (".AdminController::safe_ids($request).")"
            ." and substring_index(u.name, '.', -1) in ('wav')"
            ." order by u.created_at") );

        return view('pages.admin.list', compact('report', 'type'));
    }

    public function text(Request $request) {
        $type = 'text';
        $report = DB::select( DB::raw("select t.id, t.created_at, null name, t.text, null hide, null `rank`"
            ." from text t"
            ." where t.id in (".AdminController::safe_ids($request).")"
            ." order by t.created_at") );
        return view('pages.admin.list', compact('report', 'type'));
    }

    public function hide(Request $request) {
        DB::update( DB::raw("update uploads set hide=? where id=?"), [$request->hide, $request->id] );
        return response()->noContent(201);
    }

    public function rank(Request $request) {
        DB::update( DB::raw("update uploads set `rank`=? where id=?"), [$request->rank, $request->id] );
        return response()->noContent(201);
    }

}
