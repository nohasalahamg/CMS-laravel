<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\category;
use App\tag;
use App\post;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





     public function __construct(){



        $this->middleware('Checkcategory')->only('create');
     }
    public function index()
    {
        //
         $post=post::paginate(3);

        return view('posts.index',compact('post',$post));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create')->with('categories',category ::all())->with('tag',tag ::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //

       // dd($request->image->store('images','public'));




      // post::create($request->all());
      $post=Post::create([
'title'=>$request->title,

'content'=>$request->content,
'description'=>$request->description,
'image'=>$request->image->store('images','public'),
'category_id'=>$request->categoryname,
'user_id'=>$request->user_id




      ]);

      if($request->tagname)
      {

$post->tags()->attach($request->tagname);

      }
        $request->session()->flash('success',' posts Created Successful ');
         return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
        $user =$post->user;
        $profile=$user->profile;
        
       $categories= category ::all();

        return view('posts.show')->with('post',$post)->with('categories',$categories)->with('profile',$profile)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
        return view('posts.create',array('post'=> $post,'categories'=> category::all(),'tag'=> tag::all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, post $post)
    {
        //
$data=$request->only(['title','content','description']);
        if($request->hasfile('image'))
        {
$image=$request->image->store('images','public');

Storage::disk('public')->delete($post->image);
$data['image']=$image;


        }

        if($request->categoryname){
$post->category()->associate($request->categoryname);
        //   $post->category();
        }
if($request->tagname){

$post->tags()->sync($request->tagname);



}

        

        
        $post->update($data);
                    $request->session()->flash('success',' posts Update Successful ');
                     return redirect('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //dd(Post ::withTrashed()->get());
       // $post->delete();
      //  session()->flash('fail',' posts  trashed Successful ');
         //return redirect('post');


$post= POST :: withTrashed()->where('id',$id)->first();
if($post->trashed()){


    $post->forceDelete();
    //delete from folder 
    Storage::disk('public')->delete($post->image);
    session()->flash('fail',' posts   Delete Successful ');
}
else

{

    $post->delete();
    session()->flash('fail',' posts  trashed Successful ');
}
 
        return redirect('post');


    }





    public function trashed(){

     $trashed= Post ::onlyTrashed()->get();
     

        return view('posts.index')->withpost($trashed);
    }

    public function restore($id){

         Post ::withTrashed()->where('id',$id)->restore();
        
   
       session()->flash('success',' posts Restore  Successful ');
         return redirect('post');
       }






}
