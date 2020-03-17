



@extends('layouts.app')

@section('title','ALL categories')
@section('content')
<div class="container">

<div class="form-group">

<a  class="btn btn-primary"href="{{ route('category.create') }}"
>	<i class="fas fa-camera"></i>
Add New Category</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4">All Categories</h3>
    <i class="fa fa-user-o" ></i>
</div>
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>

@if(session()->has('errorcategory'))


<div class="alert alert-danger" role="alert">
{{ session()->get('errorcategory') }}
</div>
@endif




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
      <th scope="col"> Category Name</th>
     
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
  @forelse($category as $cat)
    <tr>
      <th scope="row">{{ $cat->id }}</th>
      <td>{{ $cat->name }}</td>
      
      <td>
   <a href="#">

   <div class="modal fade" id="delete{{$cat->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure Delete {{$cat->name }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form
      method="POST" action="{{ route('category.destroy',$cat->id) }}">
      @csrf
      @method('DELETE')
        <input  type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
   

   
    <span style="color:red" data-toggle="modal" data-target="#delete{{$cat->id}}"> Delete </span></a>|
   <a href="{{route('category.edit',$cat->id )}}"> <span style="color:blue"> Edit </span></a> |
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
    {{ $category->links() }}

@endsection




