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

        public function login_blade()
    {
        // return 'ceme';
        return view('admin.samples.login');

    }


    public function games_history()
    {
            return view('admin.tables.basic_table_history');
    }


}
