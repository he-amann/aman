@extends('layouts.app')
@section('content')
<div class="container border">
@foreach($errors->all() as $e)
    <div class="alert alert-danger">{{$e}}</div>
    @endforeach
<form method="post" action="/category">
@csrf
<div class="mb-3">
    <label for="name">cate name</label>
    <input type="text" class="form-control" name="name" id="name" required placeholder="enter the category name">
</div>
<div class="mb-3">
    <label for="description">description</label>
    <input type="text" class="form-control" name="description" id="description" required placeholder="enter the description">
</div>
<div class="mb-3 text-center">
<button class="btn btn-success">save</button>
</div>
</form>
</div>
@endsection