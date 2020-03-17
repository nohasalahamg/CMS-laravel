@extends('layouts.app')
@section('title','your Profile ')
@section('content')
<div class="container">

<div class="form-group">
<a  class="btn btn-primary" href="{{ route('tag.index') }}"
>Back To List tag</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4">  Update  profile</h3>

</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


<form action="{{ route('user.update',$User->id )}}" method="POST" enctype="multipart/form-data">
@Csrf

  <div class="form-group">
    <label for="name">user Name : </label>
    <input type="text" value =" {{$User->name}}"
    class="form-control @error('name') is-vaild @enderror" name="name">
    @error('name')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>
  


  <div class="form-group">
    <label for="email">Email: </label>
    <input type="text" value ="{{  $User->email }}"
    class="form-control @error('email') is-vaild @enderror" name="email">
    @error('email')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>

<div class="form-group">
    <label for="email">About: </label>
    <textarea class="form-control" name="about"> {{ $profile->about }}</textarea> 
     @error('about') is-vaild @enderror
    @error('about')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="facebook">facebook: </label>
    <input type="text" value ="{{ $profile->facebook }}"
    class="form-control @error('facebook') is-vaild @enderror" name="facebook">
    @error('about')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="email">Twitter: </label>
    <input type="text" value ="{{   $profile->twitter  }}"
    class="form-control @error('twitter') is-vaild @enderror" name="twitter">
    @error('twitter')

    <div class="alert alert-danger" role="alert">
  {{ $message }}
</div>
    @enderror
    <small  class="form-text text-muted"></small>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
  <label class="form-check-label" for="exampleRadios1">
    Writer
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="admin" value="option2">
  <label class="form-check-label" for="admin">
    Admin
  </label>
</div>

<div class="form-group">

<img src="{{ $User->haspicture()?
        
        
        
        asset('/storage/'.$User->getpicture() ) : $User->getavatar() }}"  width="70px" height="70px">

  <label > POST Image: </label>
 

  <input type="file"  name="picture" >




</div>

  <button type="submit" class="btn btn-primary"> Update Profile </button>
</form>
    

@endsection
