@extends('layouts.master')

@section('content')
@php
$type = !empty($category->id) ? 'Edit' : 'Add';
@endphp
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  @foreach ($errors->all() as $error)
  <span class="float-left">{{ $error }}</span><br/>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  @endforeach
</div>
@endif
<form id="addEditCategory" name="addEditCategory" method="POST" action="{{!empty($category->id) ? route('category.update', $category->id) : route('category.add')}}" enctype="multipart/form-data">
  @csrf
  <fieldset>
    <legend>{{$type}} Category</legend>
    <div class="row">
      <div class="col-md-6">
       <label for="name" class="float-left">Name</label>
       <input type="text" class="form-control" id="name" name="name" placeholder="Enetr name" minlength="3" maxlength="80" value="{{old('name') ?? (!empty($category->name) ? $category->name : '')}}" required>
     </div>
     <div class="col-md-6">
       <label for="image" class="float-left">Image</label>
       @if(!empty($category->image))
       <div id="imgContainer">
        <img src="{{Storage::disk('public')->url('/categories/'.$category->image)}}" class="edit-roun-img float-left" alt="No Image">
        <a href="javascript:void(0)" onclick="deleteImage()" class="del-icon"><i class="fa fa-trash"></i></a>
        <input type="hidden" id="oldImage" name="oldImage" value="{{$category->image}}">
        </div>
       @else
       <input type="file" class="form-control" id="image" name="image" placeholder="Select Image" required>
       @endif
     </div>
   </div>
   <div class="row">
    <div class="col-md-6">
     <label for="description" class="float-left">Description</label>
     <textarea type="text" class="form-control" id="description" name="description" rows="4" maxlength="2000" placeholder="Enetr description">{{old('description') ?? (!empty($category->description) ? $category->description : '')}}</textarea>
   </div>
   <div class="col-md-1 custom-control custom-switch mt-4 pl-0">
    <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" @if(!empty($category->status)) checked @endif>
    <label class="custom-control-label" for="status">Status</label>
  </div>
</div>
<div class="row pt-3">
  <div class="col-md-6">
    <a href="{{route('category.list')}}" class="btn btn-danger float-left">Cancel</a>
    <button type="submit" class="btn btn-primary float-left ml-3">Save</button>
  </div>
</div>
</fieldset>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
  function deleteImage() {
    if (confirm("Are you sure you want to delete this image?")) {
      $('#imgContainer').html(`
        <input type="file" class="form-control" id="image" name="image" placeholder="Select Image" required>`);
    }
  }
</script>
@endpush
