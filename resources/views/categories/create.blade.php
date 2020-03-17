@extends('layouts.app')
@section('title','create category')
@section('content')
<div class="container">

<div class="form-group">
<a  class="btn btn-primary" href="{{ route('category.index') }}"
>Back To List Categories</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4"> {{ isset($category) ? " Update Category" : " Add New Category"}}</h3>

</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


<form action="{{ isset($category) ? route('category.update',$category->id ): route('category.store')}}" method="POST">
@Csrf
@if(isset($category))
@method('PUT')
@endif
  <div class="form-group">
    <label for="name">Category Name : </label>
    <input type="text" value ="{{  isset($category) ? $category->name : old('name') }}"
    class="form-control @error('name') is-vaild @enderror" name="name">
    @error('name')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>
  
 
  <button type="submit" class="btn btn-primary">{{ isset($category) ? " Update Category" : "Add Category"}}</button>
</form>
    

@endsection
