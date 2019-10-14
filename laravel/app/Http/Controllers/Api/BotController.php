<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bot;
use App\BotTemplate;
use App\Http\Controllers\Controller;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = BotTemplate::where("name","like","%".$request->search_text."%")->get();

        return response()->json([
            'status' => 'success',
            'bots' => view("admin/bot/bottemplate",["bot_templates"=>$items])->render(),
        ]);
    }

}
