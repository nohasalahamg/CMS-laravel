<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
use App\category;

class Welcomecontroller extends Controller
{


    //
    public function index(){





        return view('welcome',[
        
        'posts'=>post::all()]);}
}
