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
    dd($request->all());

        // $request->validate([
        //     'user_name' => 'required|string',
        //     'password' => 'required|string',
        // ]);
            // if ($request->user_name=='admin' && $request->password='admin12345') {
            //     //    return 'came';
            //     return view('admin.dashboard');
            // } else {
            //     return view('admin.samples.login');
            // }

    }
    else
    {
        return view('admin.forms.basic_elements');
    }




    //    return 'came';

   }
   public function update($id)
   {


    $user=User::where('id',$id)->first();
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




