@extends('layouts.app')
@section('content')
<style>
      .dgrid{
             border: 2px solid #aaa;
             padding: 5px;
             display: grid;
             grid-template-columns: 1fr 1fr 1fr;
      }
</style>
<div class="container border">
@foreach($errors->all() as $e)
    <div class="alert alert-danger">{{$e}}</div>
    @endforeach
<form method="post" action="/product">
@csrf
<div class="mb-3">
    <label for="name">cate name</label>
    
    <div class="dgrid"> 
    @foreach($cdata as $cinfo)
    <div>
    <input type="checkbox" id="c{{$cinfo['id']}}" name="category_id[]" value="{{$cinfo['id']}}">
    <label for="c{{$cinfo['id']}}">
      {{$cinfo['name']}}  
</label>
 </div>
    @endforeach
    </div>
</div>
<div class="mb-3">
    <label for="name">product name</label>
    <input type="text" class="form-control" name="name" id="name" required placeholder="enter the product name">
</div>
<div class="mb-3">
<div class="mb-3">
    <label for="price"> price</label>
    <input type="text" class="form-control" name="price" id="price" required placeholder="enter the price">
</div>
<div >
    <label for="description">description</label>
    <input type="text" class="form-control" name="description" id="description" required placeholder="enter the description">
</div>
<div class="mb-3">
    <label for="discount">discount </label>
    <input type="text" class="form-control" name="discount" id="discount" required placeholder="enter the discount">
</div>
<div class="mb-3">
<div class="mb-3 text-center">
<button class="btn btn-success">save</button>
</div>
</form>

</form>
</div>
@endsection