<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function dashboard()
    {
        // return 'ceme';
        return view('admin.dashboard');

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


}
