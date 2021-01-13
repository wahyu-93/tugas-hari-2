<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class otps extends Model
{
    protected $fillable = [
        'otp_code',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if( ! $model->getKey()){
                $model->{$model->getKeyName()} = (string) Str::uuid();      
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
