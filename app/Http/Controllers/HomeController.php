<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{

    public function dashboard()
    {
        // $user=Games::get();
        // dd($user);
        // return 'ceme';
        $tz = new DateTimeZone('Asia/tashkent');
        // $date=setTimezone($tz);
                // dd($tz);


                // use Carbon\Carbon;
                // $carbon = Carbon::now(DateTimeZon('Asia/tashkent'));
                // dd($carbon);
            //     $tomorrow = Carbon::tomorrow();
            //     $yesterday = Carbon::yesterday();
            //     $today = Carbon::today();
            // dd($today);

            $mytime = Carbon::now($tz);
         echo $mytime->toDateTimeString();


        // return view('admin.dashboard');

    }


        public function login_blade()
    {
        // return 'ceme';
        return view('admin.samples.login');

    }


    public function login_form(Request $request)
    {
        if ($request->method() == 'POST')
        {
        // dd($request->all());

            $request->validate([
                'user_name' => 'required|string',
                'password' => 'required|string',
            ]);
                if ($request->user_name=='admin' && $request->password='admin12345') {


                    //    return 'came';
                    return view('admin.dashboard');
                } else {
                    return view('admin.samples.login');
                }

        }
        else
        {
           return view('admin.samples.login');
        }
    }



    public function games_history()
    {
            return view('admin.tables.basic_table_history');
    }
}
