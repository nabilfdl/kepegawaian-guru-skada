<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function birthday(){
        $today = date('Y-m-d');
        $users = User::whereRaw('DATE_FORMAT(birth_date, "%m-%d") = ?', [date('m-d', strtotime($today))])->get();
        
        return view('ulang-tahun', ['users' => $users, 'today' => $today]);
    }
}
