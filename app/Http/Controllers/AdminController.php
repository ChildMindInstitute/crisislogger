<?php

namespace App\Http\Controllers;

use App\Texts;
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
        $searchText = $request->get('search-text');
        $referral_code = $request->get('referral-code');
        $searchWhere = $referralWhere = '';
        if (isset($searchText) && strlen($searchText))
        {
            $searchWhere = ' and t.text LIKE "%'.$searchText.'%"';
        }
        if (isset($referral_code) && strlen($referral_code))
        {
            $referral_code = strtolower($referral_code);
            if (strlen($users_include))
            {
                $referralWhere = ' and referral_code like "%'.$referral_code.'%"';
            }
            else {
                $referralWhere = ' referral_code like "%'.$referral_code. '%"';
            }
        }
        $where_date = " where 1"
            .($date_from? " and created_at >= date('".$date_from."')": "")
            .($date_till? " and created_at < adddate('".$date_till."', 1)": "");

        $query =
            "select d,"
            ."id, type,
            public, hide"
            ." from ("
            ."   select date(u.created_at) d, u.id, substring_index(u.name, '.', -1) type, u.user_id, u.share as public, u.hide as hide  from uploads as u left outer join transcriptions t on t.upload_id=u.id
 ".$where_date ." and video_generated != 1".$searchWhere
            ."   union all"
            ."   select date(t.created_at) d, t.id, 'txt',t.user_id , t.share, t.hide as hide  from text as t ".$where_date.$searchWhere
            .") t "
            ." where 1"
            .($users_include || $referralWhere? " and user_id in (select id from users where ".$users_include." ".$referralWhere.")": "")
            .($users_exclude? " and (user_id not in (select id from users where ".$users_exclude.") or user_id is NULL)": "")
            ." order by d desc";
        $reports = DB::select( DB::raw($query) );
        $result = array(
        );
        if (count($reports) > 0)
        {
            foreach ($reports as $report)
            {
                $type = 'video';
                if ($report->type === 'txt')
                {
                    $type = 'txt';
                }
                else if ($report->type === 'wav')
                {
                    $type = 'audio';
                }
                if ($report->public && $report->hide === 0)
                {
                    $result[$report->d][$type]['published'][] = $report->id;
                }
                else if ($report->public && ($report->hide || is_null($report->hide))){
                    $result[$report->d][$type]['rejected'][] = $report->id;
                }
                else if (!$report->public)
                {
                    $result[$report->d][$type]['private'][] = $report->id;
                }
            }
        }
        return view('pages.admin.index', compact('result', 'users_include', 'users_exclude', 'date_from', 'date_till', 'searchText', 'referral_code', 'query'));
    }

    private static function safe_ids(Request $request) {
        // safe string of comma separated integers
        return implode(',', array_map('intval', explode('|', $request->keys()[0])));
    }

    public function video(Request $request) {
        #\Log::info("query: ".AdminController::ids($request));
        $type = 'video';
        $report = DB::select( DB::raw("select u.id, u.created_at,u.where_from, u.name, t.text, t.encrypted, u.hide, u.rank, u.share , a.name as user_name, a.email as user_email"
            ." from uploads u left outer join transcriptions t on t.upload_id=u.id left join users as a on a.id=u.user_id"
            ." where u.id in (".AdminController::safe_ids($request).")"
            ." and substring_index(u.name, '.', -1) not in ('wav')"
            ." order by u.created_at") );
        if (count($report))
        {
            foreach ($report as &$item)
            {
                if ($item->encrypted)
                {
                    $item->text = self::decryptPureSQLData($item->text);
                    $item->user_name = self::decryptPureSQLData($item->user_name);
                }
            }
        }
        return view('pages.admin.list', compact('report', 'type'));
    }

    public function audio(Request $request) {
        $type = 'audio';
        $report = DB::select( DB::raw("select  distinct u.id,u.where_from, u.created_at, u.name, t.text, t.encrypted, u.hide, u.rank, u.share, a.name as user_name, a.email as user_email"
            ." from uploads u left outer join transcriptions t on t.upload_id=u.id left join users as a on a.id=u.user_id"
            ." where u.id in (".AdminController::safe_ids($request).")"
            ." and substring_index(u.name, '.', -1) in ('wav')"
            ." order by u.created_at ") );
        if (count($report))
        {
            foreach ($report as &$item)
            {
                if ($item->encrypted)
                {
                    $item->text = self::decryptPureSQLData($item->text);
                    $item->user_name = self::decryptPureSQLData($item->user_name);
                }
            }
        }
        return view('pages.admin.list', compact('report', 'type'));
    }

    public function text(Request $request) {
        $type = 'text';
        $report = DB::select( DB::raw("select t.id, t.created_at, t.where_from, null name, t.text, t.encrypted , hide, share, `rank`,  a.name as user_name, a.email as user_email"
            ." from text t  left join users as a on a.id=t.user_id"
            ." where t.id in (".AdminController::safe_ids($request).")"
            ." order by t.created_at") );
        if (count($report))
        {
            foreach ($report as &$item)
            {
                if ($item->encrypted)
                {
                    $item->text = self::decryptPureSQLData($item->text);
                    $item->user_name = self::decryptPureSQLData($item->user_name);
                }
            }
        }
        return view('pages.admin.list', compact('report', 'type'));
    }

    public function hide(Request $request) {
        $type = $request->get('type');
        if ($type =='text')
        {
            Texts::find($request->id)->update(['hide' => $request->hide]);
        }
        {
            Upload::find($request->id)->update(['hide' => $request->hide]);
        }

        return response()->noContent(201);
    }

    public function rank(Request $request) {
        $type = $request->get('type');
        if ($type ==='text')
        {
            Texts::find( $request->id)->update(['rank' => $request->rank]);
        }
        {
            Upload::find( $request->id)->update(['rank' => $request->rank]);
        }
        return response()->noContent(201);
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
