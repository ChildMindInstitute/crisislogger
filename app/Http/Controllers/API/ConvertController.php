<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\VideoConversionJob;
use App\Upload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Queue\Jobs\Job;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ConvertController extends Controller
{
    //
    public function convertVideoTranscode(Request $request)
    {
        $params = $request->all();
        $host = $request->getHost();
        if (!isset($params['upload_id']))
        {
             throw new BadRequestHttpException('Upload id is required', null, 400);
        }
        $upload  = new Upload();
        $env = 'local';
        if (preg_match('/^staging/', $host))
        {
            $upload->setConnection('mysql_staging');
            $env = 'staging';
        }
        if (preg_match('/^local/', $host))
        {
            $upload->setConnection('mysql_local');
        }
        else {
            $upload->setConnection('mysql_prod');
            $env = 'prod';
        }
        $upload = Upload::findOrFail($params['upload_id'])->where('audio_generated', false);
        if (!$upload)
        {
            throw new ModelNotFoundException('Upload data not found',400);
        }

        try {
            VideoConversionJob::dispatch($upload, $env);
        }
        catch (\Exception $exception)
        {
            return response()->json(['message' => $exception->getMessage()]);
        }
        return response()->json(['message' => 'Successfully converted', 'success' => 1],   Response::HTTP_OK);
    }
}