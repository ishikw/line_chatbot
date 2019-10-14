<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Store extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'zip', 'address', 'phone'
    ];
    public function bots()
    {
        return $this->hasMany('App\Bot');
    }
    public static function validator($credentials, $type = '', $id = null){
        $rules = [
            'name' => 'required|string|max:255',
        ];
		return Validator::make($credentials, $rules);
    }
}
