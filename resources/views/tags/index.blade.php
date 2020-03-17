



@extends('layouts.app')

@section('title','ALL tags')
@section('content')
<div class="container">

<div class="form-group">

<a  class="btn btn-primary"href="{{ route('tag.create') }}"
>	<i class="fas fa-camera"></i>
Add New tag</a> 
   </div>



 <div class="jumbotron jumbotron-fluid">
  
    <h3 class="display-4">All tags </h3>
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
      <th scope="col"> tag Name</th>
     
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
  @forelse($tag as $tg)
    <tr>
      <th scope="row">{{ $tg->id }}</th>
      <td>{{ $tg->name }} <span class="badge badge-primary"> {{ $tg->posts()->count() }}</span> </td>
      
      <td>
   <a href="#">

   <div class="modal fade" id="delete{{$tg->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure Delete {{$tg->name }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form
      method="POST" action="{{ route('tag.destroy',$tg->id) }}">
      @csrf
      @method('DELETE')
        <input  type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
   

   
    <span style="color:red" data-toggle="modal" data-target="#delete{{$tg->id}}"> Delete </span></a>|
   <a href="{{route('tag.edit',$tg->id )}}"> <span style="color:blue"> Edit </span></a> |
   <a href="{{route('tag.show',$tg->id )}}"> <span style="color:green">view </span></a>
   
   </td>
    </tr>
    @empty
    <div class="alert alert-warning" role="alert">
    No Available Record ....
</div>
   

    @endforelse
  </tbody>
</table>
    {{ $tag->links() }}

@endsection




