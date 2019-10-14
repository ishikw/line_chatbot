<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bot;
use App\BotTemplate;
use LINE\LINEBot;


class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Auth::user()->store->bots;

        return view('admin.bot.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bot_templates = BotTemplate::findByText($request->input("search_text"));
        return view('admin.bot.create', compact('bot_templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = [
            'name' => $request->name,
            'template_id' => $request->template_id,
            'is_open' => $request->is_open,
            'store_id' => Auth::user()->store_id,
            'qr_url' =>"",
            'image_url' =>""
        ];
        $validator = Bot::validator($params, 'login');

        if ($validator->passes()) {
            $bot = Bot::create($params);
            
            if ($bot) {
                return redirect('/admin/bot')->with("message","BOTを登録しました");
            }
        }
        
        return back()->withInput($request->all)->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $item = Bot::find($id);
        $bot_templates = BotTemplate::findByText($request->input("search_text"));
        return view('admin.bot.edit', compact('item',"bot_templates"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->name,
            'template_id' => $request->template_id,
            'is_open' => $request->is_open?:0,
            'store_id' => Auth::user()->store_id,
            'qr_url' =>"",
            'image_url' =>""
        ];


        $bot = Bot::where([
            ['id', '=', $id],
            ['store_id', '=', Auth::user()->store_id]
        ]);
        if(!$bot->count())
            abort(500);
        $validator = Bot::validator($params, 'edit',$id);
        if ($validator->passes()) {
            $bot->update($params);
            return redirect('/admin/bot')->with("message","BOTを更新しました");
        }else{
            return back()->withInput($request->all)->withErrors($validator);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bot = Bot::where([
            ['id', '=', $id],
            ['store_id', '=', Auth::user()->store_id]
        ]);
        if(!$bot->count())
            abort(500);
        $bot->delete();
        return back()->with("message","BOTを削除しました");
    }

    /**
     * Display chat
     *
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        return view('admin.bot.chat');
    }
}
