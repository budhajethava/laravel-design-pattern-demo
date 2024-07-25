@extends('layouts.master')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session()->get('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<a href="{{route('category.create')}}" class="btn btn-secondary mb-2 float-right">Add Category</a>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
      </tr>
  </thead>
  <tbody>
      @if($categories->isNotEmpty())          
      @foreach($categories as $category)
      <tr>
          <th scope="row">{{$category->id}}</th>
          <td>
            <img src="{{Storage::disk('public')->url('/categories/'.$category->image)}}" class="rounded-img" alt="No Image">
        </td>
        <td>{{$category->name}}</td>
        <td>{{$category->status ? 'Active' : 'Inactive'}}</td>
        <td>
            <a href="{{route('category.edit', $category->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
            <a href="{{route('category.delete', $category->id)}}" onclick="return confirm('Are you sure you want to delete this category ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>

    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="5">No category found!</td></tr>
        @endif
    </tbody>
</table>
@endsection
