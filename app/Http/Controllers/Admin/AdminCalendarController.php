<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;
use App\Holiday;
use App\User;
use Carbon\Carbon;
use Yasumi\Yasumi;

class AdminCalendarController extends Controller
{
    //
    public function index(Request $request){
        $users = User::all();
        $now = Carbon::now();
        $isHolidays = Yasumi::create('Japan', $now->year, 'ja_JP')->getHolidayDates();
        $current_month = Carbon::createFromDate($now->year, $now->month-1, 1, 'Asia/Tokyo');
        $current_month_weekday = $current_month->dayOfWeek;
        $weekdays = ['日','月','火','水','木','金','土'];
        return view('admincalendar.index', ['users' => $users, 'day' => $now, 'weekdays' => $weekdays, 'current_month' => $current_month, 'current_month_weekday' => $current_month_weekday, 'isHolidays' => $isHolidays]);

    }
   
    //public function hoge(){
        //return view('admincalendar.index', ['days' =>Calendar::getDays]);
   // }
}
