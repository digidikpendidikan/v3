<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function sponsor(){
        return view('page.sponsor');
    }

    public function experience(){
        return view('page.experience');
    }

    public function tentang(){
        return view('page.tentang');
    }

    public function aturan(){
        return view('page.aturan');
    }

    public function privasi(){
        return view('page.privasi');
    }

    public function tim(){
        return view('page.tim');
    }

    public function telegram(){
        return view('page.telegram');
    }
    
}
