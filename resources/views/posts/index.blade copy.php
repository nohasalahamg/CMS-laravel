



@extends('layouts.app')

@section('title','ALL Posts')
@section('content')
<div class="container">

<div class="form-group">

<a  class="btn btn-primary"href="{{ route('post.create') }}"
>	<i class="fas fa-camera"></i>
Add New Post</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4">All Posts</h3>
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
      <th scope="col"> Post Title</th>
      <th scope="col"> Post Description</th>
      <th scope="col"> Image</th>
     
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
  @forelse($post as $pot)
    <tr>
      <th scope="row">{{ $pot->id }}</th>
      <td>{{ $pot->title }}</td>
      
      <td>{{ $pot->description }}</td>
      <td>
      
 
      
      
      <img src="{{ asset('storage/'.$pot->image) }}" width="100px" height="50px" alt="no image"/> </td>
      <td>


   <a href="#">

   <div class="modal fade" id="delete{{ $pot->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record {{$pot->name }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure {{ $pot->trashed() ? 'delete' : 'trash' }}  ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form
      method="POST" action="{{ route('post.destroy',$pot->id) }}">
      @csrf
      @method('DELETE')

        <input  type="submit" value="{{ $pot->trashed() ? 'delete' : 'trash' }}"  class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
   

   
    <span style="color:red" data-toggle="modal" data-target="#delete{{ $pot->id }}"> {{ $pot->trashed() ? 'Delete' : 'trash' }} </span></a>|
   <a href="{{route('post.edit',$pot->id )}}"> <span style="color:blue"> Edit </span></a> |

   <a href="#"> <span style="color:green">view </span></a>
   
   </td>
    </tr>
    @empty
    <div class="alert alert-warning" role="alert">
    No Available Record ....
</div>
   

    @endforelse
  </tbody>
</table>

 

@endsection




