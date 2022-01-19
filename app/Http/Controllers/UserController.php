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
    return view('admin.tables.basic_table', compact('customers'));
   }

   public function create()
   {
    //    return 'came';
    return view('admin.forms.basic_elements');
   }
}




