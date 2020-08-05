<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    //
    public function create(Request $request)
    {   
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list,'data' => $data]);
    }
   
    public function show(Request $request)
    {
        $validatedData = $request->validate([
            'day' => 'required|date_format:Y-m-d',
            'description' => 'required',
        ]);
        // POSTで受信した休日データの登録
        if (isset($request->id)) {
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->day = $request->day;
            $holiday->description = $request->description;        
            $holiday->save();
        } else {
            $holiday = new Holiday(); 
            $holiday->day = $request->day;
            $holiday->description = $request->description;        
            $holiday->save();
        }
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function edit($id)
    {
        // 休日データ取得
        $data = new Holiday();
        if (isset($id)) {
            $data = Holiday::where('id', '=', $id)->first();
        } 
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function delete(Request $request){
        //Deleteで受信した休日データの削除
        if(isset($request->id)){
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->delete();
        }
        //休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list , 'data' => $data]);

    }
}
