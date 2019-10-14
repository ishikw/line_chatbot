<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Bot extends Model
{
    //
    protected $fillable = [
        'name', 'template_id', 'store_id', 'is_open',"qr_url","image_url"
    ];
    public static function validator($credentials, $type = '', $id = null){
        $rules = [
            'name' => 'required|string|max:255',
            'template_id' => 'required',
            'store_id' => 'required',
        ];
		return Validator::make($credentials, $rules);
    }
}
