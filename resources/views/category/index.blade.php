@extends('layouts.app')
@section('aman')
@endsection
@section('content')

<div class="container">
    @if($gt=Session::get('grt'))
    <div class="alert alert-success">

        {{$gt}}
        </div>
    @endif<br>
    <a href="/category/create" class="btn btn-primary">New Category</a>
    <table class="table table-striped">
     <thead>
           <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th> description</th>
              <th>edit</th>
              <th>delete</th>
           </tr>
     </thead>
     <tbody>
           @foreach ($data as $info)
           <tr>
                 <td>{{$loop->iteration}}</td>
               <td>
            
               {{$info['name']}}
               
            </td>
               
               <td>{{$info['description']}}</td>
               <td>
               <a href="/category/{{$info['id']}}/edit"> 
             <button class="btn btn-success"> edit</button>
             </a></td>
            <td>
              <form method="post" action="/category/{{$info['id']}}">
              @csrf    
              @method('delete')
                  <button class="btn btn-danger" onclick="return confirm('do you really delete')">delete</button>
              </form>
            </td>
                  </form>
                 </td>
           </tr>
           @endforeach
     </tbody>
    </table>
</div>

@endsection