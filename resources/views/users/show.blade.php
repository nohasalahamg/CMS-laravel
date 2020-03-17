



@extends('layouts.app')

@section('title','ALL tags')
@section('content')
<div class="container">

<div class="form-group">

<a  class="btn btn-primary"href="{{ route('tag.index') }}"
>	<i class="fas fa-camera"></i>
All tags</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4"> view tag</h3>
    <i class="fa fa-user-o" ></i>
</div>
    






@if($tag->count()>0)
<div class="alert alert-primary" role="alert">
  Count Of Posts {{ $tag->count() }}
</div>

@else

<div class="alert alert-primary" role="alert">
   No tag Count
</div>

@endif



<div class="media">
  <div class="media-body">
    <h5 class="mt-0 mb-1"> name : {{ $tag->name }}</h5>

  

  </div>
  
</div>




@endsection




