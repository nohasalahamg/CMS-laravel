<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TagRequest;

use App\tag;


class tagcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tag=tag::paginate(3);

        return view('tags.index',compact('tag',$tag));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        //dd(tag ::all());
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //

        tag::create($request->all());
        $request->session()->flash('success','Tag Created Successful ');
         return redirect('tag');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
        //$tags=tag ::find($id);
        
        return view('tags.show',compact('tag',$tag));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        //

       // $tags=tag ::find($id);
        return view('tags.create',compact('tag',$tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request , tag $tag)
    {
        //

        $tag->update($request->all());
        $request->session()->flash('success',' Category update Successful ');
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        //

        $tag->delete();
        session()->flash('fail',' tag Delete Successful ');
        return redirect('tag');
    }


}
