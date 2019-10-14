<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Store;
use Illuminate\Support\Facades\Input;


class StoreController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Auth::user()->store;
        return view('admin.store.index', compact('store'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = [
            'name' => $request->name,
            'zip' => $request->zip,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];


        $store = Auth::user()->store;
        if(!$store->count())
            abort(500);
        $validator = Store::validator($params, 'edit');
        if ($validator->passes()) {
            $store->update($params);
            return redirect('/admin/store')->with("message","店舗情報を更新しました");
        }else{
            return back()->withInput($request->all)->withErrors($validator);
        }
    }

}
