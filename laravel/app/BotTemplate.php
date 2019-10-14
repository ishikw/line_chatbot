<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotTemplate extends Model
{
    public function bot_count(){
        return $this->hasMany('App\Bot',"template_id","id")->count();
    }
    //
    public static function findByText($text){
        $query = self::query();
        if($text)
            $query->where("name",$text);
        return $query->get();
    }
}
