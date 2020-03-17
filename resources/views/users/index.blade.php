



@extends('layouts.app')

@section('title','ALL users')
@section('content')
<div class="container">

<div class="form-group">

<a  class="btn btn-primary"href="{{ route('user.create') }}"
>	<i class="fas fa-camera"></i>
Add New tag</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4">All user </h3>
    <i class="fa fa-user-o" ></i>
</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


@if(session()->has('success'))


<div class="alert alert-success" role="alert">
{{ session()->get('success') }}
</div>
@endif


@if(session()->has('fail'))


<div class="alert alert-danger" role="alert">
{{ session()->get('fail') }}
</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> User Name</th>
      <th scope="col"> Email</th>
      <th scope="col">Role</th>
      <th scope="col"> Image</th>
      
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
  @forelse($user as $use)
    <tr>
      <th scope="row">{{ $use->id }}</th>
      <td>{{ $use->name }} <span class="badge badge-primary"> </span> </td>
      <td> <span class="badge badge-primary"> </span> <img 
      src="{{ $use->haspicture()?
        
        
        
         asset('/storage/'.$use->getpicture() ) : $user->getavatar() }}"
      
      width="70px" height="70px"
      ></td>
      <td>
      
      @if(!$use->isadmin())
      <form action="{{route('user.makeadmin',$use->id ) }}" method="POST">
      @csrf
     
      <button class="btn btn-primary btn-sm" type="submit">
      Make Admin
      
      </button>
      </form>
      @else


   

    <form action="{{route('user.makenormal',$use->id ) }}" method="POST">
      @csrf
     
      <button class="btn btn-primary btn-sm" type="submit">
      Make writer
      
      </button>
      {{ $use->role }} 
      @endif
      <span class="badge badge-primary"> </span> 
      
      
      
      </td>
      
      <td>{{ $use->email }} <span class="badge badge-primary"> </span> </td>
    </tr>
    @empty
    <div class="alert alert-warning" role="alert">
    No Available Record ....
</div>
   

    @endforelse
  </tbody>
</table>


@endsection




