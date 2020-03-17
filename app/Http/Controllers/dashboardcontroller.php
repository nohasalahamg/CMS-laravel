<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
use App\category;
class dashboardcontroller extends Controller
{
    //




public function index(){





return view('dashboard.index',[

'posts_count'=>post::all()->count(),
'users_count'=>user::all()->count(),
'categories_count'=>category::all()->count()


]






);

}
}
