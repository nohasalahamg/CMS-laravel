<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

use App\http\Requests\CategoryRequest;

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      // $category= Category::all();
       $category=Category::paginate(3);

        return view('categories.index',compact('category',$category));
    
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //store in database
        category::create($request->all());
           $request->session()->flash('success',' Category Created Successful ');
            return redirect('category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
        return view('categories.create',compact('category',$category));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
        return view('categories.create',compact('category',$category));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //

       // $category->name=$request->name;
        //$category->save();
        $category->update($request->all());
        $request->session()->flash('success',' Category update Successful ');
        return redirect('category');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

        $category->delete();
        session()->flash('fail',' Category Delete Successful ');
        return redirect('category');
    }
}
