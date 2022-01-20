<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;

// use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{
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
    //    return redirect()->route('user.tables');
    // return 'came';
    //    return 'came';
    // return view('admin.forms.basic_elements_update');
   }
}




