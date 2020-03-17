@extends('layouts.app')
@section('title','Process category')

@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')


<div class="container">

<div class="form-group">
<a  class="btn btn-primary" href="{{ route('category.index') }}"
>Back To List Posts</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4"> {{ isset($post) ? " Update POST" : " Add New POST"}}</h3>

</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


<form action="{{ isset($post) ? route('post.update',$post->id ): route('post.store')}}" method="POST" enctype="multipart/form-data">
@Csrf
@if(isset($post))
@method('PUT')
@endif
  <div class="form-group">
    <label for="title"> title: </label>
    <input type="text" value ="{{  isset($post) ? $post->title : old('title') }}"
    class="form-control @error('title') is-vaild @enderror" name="title">
    @error('title')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>


  
  <div class="form-group">
   
    <input type="hidden" value ="{{Auth::user()->id}}"
    class="form-control" name="user_id">
    @error('user_id')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>





  <div class="form-group">
    <label for="description">  Description : </label>
    <textarea value =""
    class="form-control @error('description') is-vaild @enderror" name="description">{{  isset($post) ? $post->description : old('description') }}</textarea>
    @error('description')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>




  <div class="form-group">
    <label for="content"> Content: </label>
    
    
    <!--<textarea type="text" value =""
    class="form-control @error('content') is-vaild @enderror" name="content">{{  isset($post) ? $post->content : old('content') }}</textarea>

-->


    <input id="x" value ="{{  isset($post) ? $post->content : old('content') }}" type="hidden" name="content">
        <trix-editor input="x"></trix-editor>




    @error('content')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>




  <div class="form-group">
    <label for="selectcategory">Select Category </label>
    <select name="categoryname"  class="form-control" id="selectcategory">
    @foreach($categories as $category)
      <option value="{{ $category->id }}"
      
      
      @if(isset($post))
      @if($post->Hascategory($category->id))
      selected
      @endif
      @endif
      
      
      
      
      
      
      >{{ $category->name }}</option>
 @endforeach
    </select>
  </div>


  @if(!$tag->count()<= 0)
  <div class="form-group">
    <label for="selecttag">Select tag </label>
    <select name="tagname[]"  class="js-example-basic-multiple form-control" id="selecttag" multiple>
    @foreach($tag as $ta)
      <option value="{{ $ta->id }}"
      
      @if(isset($post))
      @if($post->HasTag($ta->id))
      selected
      @endif
      @endif
      
      
    >{{ $ta->name }}</option>
 @endforeach
    </select>
  </div>
@endif



  <div class="form-group">
  @if( isset($post))

  <img src="{{ asset('storage/'.$post->image) }}" width="100px"  height="100px" class="ml-3" alt="...">
  @endif
  <label > POST Image: </label>
 

  <input type="file"  name="image" >




</div>
</div>


 
  <button type="submit" class="btn btn-primary">{{ isset($post) ? " Update POST" : "Add POSt"}}</button>
</form>
    

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" ></script>
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection