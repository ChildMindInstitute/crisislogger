<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Storage;

/**
 * Class Upload
 * @package App
 * @mixin Eloquent
 * @property int id
 * @property string name
 * @property int user_id
 * @property int share
 * @property int contribute_to_science
 * @property CarbonImmutable created_at
 */
class Upload extends Model
{

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value){
        $name = str_replace('/storage/', '', $value);
        return 'https://storage.googleapis.com/' . env('GOOGLE_CLOUD_STORAGE_BUCKET') . "/$name";
    }
}
