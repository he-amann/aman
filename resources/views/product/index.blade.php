@extends('layouts.app')
@section('aman')
@endsection
@section('content')
<div class="container">
    @if($gt=Session::get('grt'))
    <div class="alter alter-success text-center">
        {{$gt}}
    @endif
    <table class="table table-striped">
     <thead>
           <tr>
              <th>S.No</th>
              <th>product name</th>
              <th>product category</th>
              <th> price</th>
              <th> description</th>
              <th> discount</th>
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
               <td>
                  @foreach($info['allcategory'] as $cid)

{{$cid['categoryId']['name']}}                  


                  @endforeach
               </td>
               <td>{{$info['price']}}</td>
               <td>{{$info['description']}}</td>
               <td>{{$info['discount']}}</td>
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