<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\VideoConversionJob;
use App\Upload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ConvertController extends Controller
{
    //
    public function convertVideoTranscode(Request $request)
    {
        $params = $request->all();
        if (!isset($params['upload_id']))
        {
             throw new BadRequestHttpException('Upload id is required', null, 400);
        }
        if (!isset($params['environment']))
        {
            throw new BadRequestHttpException('Environment mode id is required', null, 400);
        }
        if (!in_array($params['environment'], array('staging', 'local', 'production')))
        {
            throw new BadRequestHttpException('Environment need to be one of staging, local, production', null, 400);
        }
        $env = 'local';
        $environment = $params['environment'];
        if (preg_match('/^staging/', $environment))
        {

            DB::setDefaultConnection('mysql_staging');
            $env = 'staging';
        }
        else if (preg_match('/^local/', $environment))
        {
            DB::setDefaultConnection('mysql');
        }
        else {
            DB::setDefaultConnection('mysql_prod');
            $env = 'prod';
        }
        $upload = Upload::where('audio_generated', false)->findOrFail($params['upload_id']);
        if (!$upload)
        {
            throw new ModelNotFoundException('Upload data not found',400);
        }

        try {
            \Illuminate\Support\Facades\Queue::push(new VideoConversionJob($upload, $env));
        }
        catch (\Exception $exception)
        {
            return response()->json(['message' => $exception->getMessage()]);
        }
        return response()->json(['message' => 'Successfully converted', 'success' => 1],   Response::HTTP_OK);
    }
}
