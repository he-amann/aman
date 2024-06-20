@extends("layouts.app")
@section('content')
<style>
  .dgrid{
    border:1px solid  #ddd;
    padding: 5px;
    display: grid;
    grid-template-columns:  1fr 1fr 1fr 1fr;
  }
</style>


<div class="container border">
      @foreach($errors->all() as $e)
            <div class="alert alert-danger">{{$e}}</div>
      @endforeach


    <form action="/product/{{$info['id']}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="mb-3">
            <label for="product_name">Select Category:</label>

            <div class="dgrid">
              @foreach($cdata as $pinfo)

              <div>

              
              <input type="checkbox" id="{{$pinfo['id']}}" {{(in_array($pinfo['id'],$category))?"checked":""}} name="category_ id[]" value="{{$pinfo['id']}}">
              <label for="{{$pinfo['id']}}">
              {{$pinfo['name']}}
            </label>
            </div>
            @endforeach
          </div>
      </div>


      <div class="mb-3">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$info['name']}}" required placeholder="Enter Product Name">
            </div>
      
      
        <div class="mb-3">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price" value="{{$info['price']}}" required placeholder="Enter Price">
        </div>
      
      
          <div class="mb-3">
            <label for="discount">Discount</label>
            <input type="text" class="form-control" name="discount" id="discount" value="{{$info['discount']}}" required placeholder="Enter Discount">
          </div>
            
      
            <div class="mb-3">
              <label for="description">description</label>
              <input type="text" class="form-control" name="description" id="description" value="{{$info['description']}}" required placeholder="Enter Quantity">
            </div>
      
          
           
            @if($info['photos'])
            <div>
             
            @foreach($info->photos as $img)
            <div title="Click X for delete this image" id="photos_{{$img['id']}}">
              <img src="/photo/{{$img['image']}}" height="100">

              <span onclick="delme('{{$img['id']}}')" style="font-size:30px; cursor:pointer; color:red;">&#10006;

              </span>
              </div>
            @endforeach
          </div>
            @endif
            <div class="mb-3">
    <h4><label for="photos" style="color:#960dad"> Photo:</label></h4>
    <input type="file" class="form-control" id="photos" required name="photos[]" accept="image/*" multiple>
</div>
        <div class="mb-3">
                  <button class="btn btn-success">Save</button>
       </div>

   
</form>
</div>  
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

            function delme(id)
            {
                if(confirm("do you want to delete this image"))
                {
              $.ajax({
                url:"/deleteimg/"+id,
                  type:"get",
                  success:function(r)
                  {
                    document.getElementById('photo_'+id).remove();
                      alert("done");
                  }
                }
                  )}
                }
            
          
    </script>
@endsection