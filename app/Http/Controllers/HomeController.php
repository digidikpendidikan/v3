<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $usercount = User::count();
        return view('home',compact('usercount'));
    }
}
