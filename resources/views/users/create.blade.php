@extends('layouts.app')
@section('title','create tag')
@section('content')
<div class="container">

<div class="form-group">
<a  class="btn btn-primary" href="{{ route('tag.index') }}"
>Back To List tag</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4"> {{ isset($tag) ? " Update tag" : " Add New tag"}}</h3>

</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


<form action="{{ isset($tag) ? route('tag.update',$tag->id ): route('tag.store')}}" method="POST">
@Csrf
@if(isset($tag))
@method('PUT')
@endif
  <div class="form-group">
    <label for="name">Tag Name : </label>
    <input type="text" value ="{{  isset($tag) ? $tag->name : old('name') }}"
    class="form-control @error('name') is-vaild @enderror" name="name">
    @error('name')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>
  
 
  <button type="submit" class="btn btn-primary">{{ isset($tag) ? " Update tag" : "Add tag"}}</button>
</form>
    

@endsection
