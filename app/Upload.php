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
 * @property CarbonImmutable created_at
 */
class Upload extends Model
{
    /**
     * @param $value
     */
    public function setNameAttribute($value){
        $this->attributes['name'] = Storage::url($value);
    }
}
