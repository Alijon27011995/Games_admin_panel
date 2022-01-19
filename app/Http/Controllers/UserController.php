<?php

namespace App\Http\Controllers;
use App\Http\Requests;


class UserController extends Controller
{
   public function table()
   {
    //    return 'came';
    return view('admin.tables.basic_table');
   }

   public function create()
   {
    //    return 'came';
    return view('admin.forms.basic_elements');
   }
}




