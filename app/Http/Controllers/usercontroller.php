<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\profile;
class usercontroller extends Controller
{
    //



    public function index()
    {
        //

        $user=User::all();

        return view('users.index',compact('user',$user));

    }

    public function create ()
    {
        //

        $user=User::all();

        return view('users.index',compact('user',$user));

    }

    public function store(Request $request ,User $user){


                        
                        
        $user->update($request->all());
        $request->session()->flash('success',' Profile update Successful ');
        return redirect('user');
        
            }

    public function makeadmin(User $user){


$user->role="admin";
$user->save();
return redirect('user');


    }

    public function makenormal(User $user){


        $user->role="writer";
        $user->save();
        return redirect('user');
        
        
            }


            public function edit(User $User){

                $profile =$User->profile;


                return view('users.profile')->with('User',$User)->with('profile',$profile);
                
                
                    }




                    public function update(Request $request ,User $User){


                      $profile=$User->profile;
                     
                        $data=$request->all();

                      // $data = request()->except(['_token']);
                        if($request->hasfile('picture'))
                        {

                        $picture=$request->picture->store('profilepicture','public');
                         $data['picture']=$picture;

                        }
                        
                        $profile->update($data);
                        $request->session()->flash('success',' Profile update Successful ');
                        return redirect('user');
                        
                            }






}
