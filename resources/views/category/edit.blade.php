@extends('layouts.app')
@section('content')
<div class="container border">
<form method="post" action="/category/{{$info['id']}}">
@csrf
@method('patch')
<div class="mb-3">
    <label for="name">cate name</label>
    <input type="text" class="from-control" name="name" id="name" required placeholder="enter the category name" value="{{$info['name']}}">
</div>
<div class="mb-3">
    <label for="description">description</label>
    <input type="text" class="from-control" name="description" id="description" required placeholder="enter the description"value="{{$info['description']}}">
</div>
<div class="mb-3 text-center">
<button class="btn btn-success">save</button>
</div>
</form>
</div>
@endsection