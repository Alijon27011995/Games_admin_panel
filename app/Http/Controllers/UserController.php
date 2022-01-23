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



   public function table()
   {
    //    return 'came';
    $customers=User::where('status','active')->get();
    // dd($customers);
    //  $customers = $customers->paginate(15);
    return view('admin.tables.basic_table', compact('customers'));
   }





   public function create(Request $request)
   {


    if ($request->method() == 'POST')
    {
    // dd($request->all());

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

        }

        if ($users->save()) {
            return view('admin.dashboard');
        }

        }


 //================= Apies =======================

   public function new_user_api(Request $request)
   {
    // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'players' => 'required',
            'games_type' => 'required'
        ]);


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
   public function data_time_api(Request $request)
   {

   }


}




