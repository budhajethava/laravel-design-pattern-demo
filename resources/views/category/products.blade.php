@extends('layouts.master')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($products))          
    @foreach($products as $key => $product)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <th scope="row">{{$product['title']}}</th>
      <td>
        <img src="{{$product['img']}}" class="rounded-img" alt="No Image">
      </td>
      <td>{{$product['date']}}</td>
      <td>{{$product['type']}}</td>
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="5">No product found!</td></tr>
      @endif
    </tbody>
  </table>
  @endsection
