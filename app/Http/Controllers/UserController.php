<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;

// use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{


    public function login_blade()
    {
        // return 'ceme';
        return view('admin.samples.login');

    }


    public function dashboard()
    {
           return $this->date_time();
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
                    // return view('admin.dashboard');
                    return $this->date_time();
                } else {
                    return view('admin.samples.login');
                }

        }
        else
        {
           return view('admin.samples.login');
        }
    }



   public function games_table()
   {
    //    return 'came';

        $tz = new DateTimeZone('Asia/tashkent');
        $mytime = Carbon::now($tz);
        $date=date($mytime->toDateString());
        $time=date($mytime->toTimeString());


        $users=User::where('status','active')->get();
        //    dd($users);
        foreach ($users as  $user) {
            //    dd($user);
                if ($user->date >= $date) {
                    if ($user->date > $date) {
                        $user->status='active';
                    }
                    elseif($user->date == $date && $user->time > $time){
                        $user->status='active';
                    }
                    elseif ($user->date == $date && $user->time < $time) {
                        $user->status='history';
                    }
                }
                else{
                $user->status='history';
                }
                $user->save();

        }

        $customers=User::where('status','active')->get();
        return view('admin.tables.basic_table', compact('customers'));
   }

   public function games_history()
   {
           $customers=User::where('status','history')->get();
           return view('admin.tables.basic_table_history', compact('customers'));
   }



   public function create(Request $request)
   {


    if ($request->method() == 'POST')
    {
            dd($request->all());
            $user= new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone_number;
            $user->players=$request->players;
            $user->games_type=$request->games;
            $user->date=$request->date;
            $user->time=$request->time;
            $user->status="active";
            // dd($user);
            if ($user->save()) {
                return redirect()->route("user.tables");
            }

    }
    else
    {
        return view('admin.forms.basic_elements');
    }




    //    return 'came';

   }
   public function edit($id)
   {


    $user=User::where('id',$id)->first();
    //    dd($id);
    //    return 'came';
    return view('admin.forms.basic_elements_update',compact('user'));
   }

   public function update(Request $request)
   {

    $user=User::where('id',$request->user_id)->first();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->phone=$request->phone_number;
    $user->players=$request->players;
    $user->games_type=$request->games;
    $user->date=$request->date;
    $user->time=$request->time;
    $user->status="active";
    // dd($user);
    if ($user->save()) {
        return redirect()->route("user.tables");
    }
    //    dd($id);
    //    return 'came';
    return view('admin.forms.basic_elements_update',compact('user'));
   }

   public function destroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


       $customer = User::find($id);
        $customer->delete();
        // echo 'user delite';
        return redirect()->route('user.tables');

   }


   public function user_history_destroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


       $customer = User::find($id);
        $customer->delete();
        // echo 'user delite';
        return redirect()->route('games.history');

   }



   public function date_time()
   {
            $tz = new DateTimeZone('Asia/tashkent');
            $mytime = Carbon::now($tz);
            $date=date($mytime->toDateString());
            $time=date($mytime->toTimeString());


        $users=User::where('status','active')->get();
        //    dd($users);
        foreach ($users as  $user) {
            //    dd($user);
                if ($user->date >= $date) {
                    if ($user->date > $date) {
                        $user->status='active';
                    }
                    elseif($user->date == $date && $user->time > $time){
                        $user->status='active';
                    }
                    elseif ($user->date == $date && $user->time < $time) {
                        $user->status='history';
                    }
                }
                else{
                $user->status='history';
                }
                $user->save();

        }

        $user_history=User::where('status','history')->count();
        $user_active=User::where('status','active')->count();



        return view('admin.dashboard', compact('user_active','user_history'));

        }


 //================= Apies =======================

   public function new_user_api(Request $request)
   {
    $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'players' => 'required',
            'games_type' => 'required'
            // 'date'=>'required|date_format:mm/dd/yyyy',
            // 'time' => 'required|date_format:H:i:s',
        ]);


        // $users=User::where('status','active')->get();
        // foreach ($users as  $user) {
        //     if ($user->date== $request->date && $user->time== $request->time ) {
        //         // return response('');
        //         return response()->json(['Sorry, there is another player at this time']);
        //     }
        // }
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone_number;
        $user->players=$request->players;
        $user->games_type=$request->games;
        $user->date=$request->date;
        $user->time=$request->time;
        $user->status="active";
        // dd($user);
        return response()->json([
            "results" => "indoemation came",
        ]);

        // if ($user->save()) {
        //     return response()->json([
        //         "results" => $user,
        //     ]);
        // }

   }

}




