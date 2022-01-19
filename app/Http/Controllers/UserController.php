<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
   public function table()
   {
    //    return 'came';
    $customers=User::where('status','active')->get();
    // dd($customer);
    //  $customers = $customers->paginate(15);
    return view('admin.tables.basic_table', compact('customers'));
   }

   public function create()
   {
    //    return 'came';
    return view('admin.forms.basic_elements');
   }
   public function update($id)
   {


    $user=User::where('id',$id)->first();
    //    dd($id);
    //    return 'came';
    return view('admin.forms.basic_elements_update');
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




