{{-- @extends("layouts.app")
@section('content') --}}
@include('header')
<div class="apo">
<main class="container">
 
    <!-- Left Column / Headphones Image -->
    @foreach ($product->photos as $img)
                                    <div class="image-gallery">
                                        <div title="image-item" id="photos_{{ $img['id'] }}">
                                            <img src="/photo/{{ $img['image'] }}" class="slide active" height="100%"width="100%">
                                        </div>
                                    </div>
                                @endforeach
   
    <!-- Right Column -->
    <div class="right-column">
   
      <!-- Product Description -->
      <div class="product-description">
        <span>{{ $product['name'] }}</span>
        <h1>{{ $product['name'] }}</h1>
        <p>{{ $product['description'] }}</p>
      </div>
   
      <!-- Product Configuration -->
      <div class="product-configuration">
   
        <!-- Product Color -->
       
   
        <!-- Cable Configuration -->
        
   

        <!-- Product Pricing -->
      @if ($product['discount'] > 0)
      <p class="product-price">
       <span class="product-discounted-price">
              ₹{{ $product['price'] - ($product['price'] * $product['discount']) / 100 }}
          </span>
          <span class="product-original-price">
              ₹{{ $product['price'] }}
          </span>
       <div class="jb"> <span class="product-discount-percnt">{{ $product['discount'] }}% OFF</span></div>

      </p>
  @else
      <div class="jc"><ul class="product-price">
          ₹{{ $product['price'] }}
      </ul></div>
  @endif
  <form>
  <div class="up">
  <button class="addtocart">
    <div class="pretext">
      <input type=""
      <i class="fas fa-cart-plus"></i> ADDTO
      CART
    </div>
    
    <div class="pretext done">
      <div class="posttext"><i class="fas fa-check"></i> ADDED</div>
    </div>
  </button>
  <form action="{{URL::to(addtocart)}}"method="POST">
    @csrf
    <div class="product_details_cart_option">
    <div class="quantity">
    <div class="pro-qty">
    <input type="number" name="pro-qty" min="1" value="1">
    </div>
    <input type="hidden" name="id" value="{{$product->id}}" />
    <button type="submit" name="addtocart" class="primary-btn">add to cart</button>
    </div> I
    </div>
    </form>
</form>
</div>
  <div class="abc">
  <button class="addtocart">
    <div class="pretext">
      <i class="fas fa-cart-plus"></i>BUY NOW 
    </div>
    
    <div class="pretext done">
      <div class="posttext"><i class="fas fa-check"></i> ADDED</div>
    </div>
  </div>
    
  </button>
      </div>
    </div>
  </div>
  </main>
  <style>
  /* Basic Styling */
  .apo{
    background-color: #000000
  }
  .container{
    background: #000000;
    width: 200%;
  }
  .product-original-price {
            font-size: 14px;
            text-decoration: line-through;
            color: #c62323;
            margin-left: 8px;
        }

  .jb{
    color: rgb(22, 146, 78);
  }
  .abc{
        text-transform: uppercase;
        text-decoration: none;
        text-align: center;  
    /height: 10%;
      /* width: 20%;  */
    padding: 3%;
  }
  .up{
        text-transform: uppercase;
        /* text-decoration: none; */
        text-align: center;  
    /height: 10%;
      /* width: 20%;  */
    padding: 3%;
  }


.addtocart{
  /* display:block; */
  /* padding:0.5em 1em 0.5em 1em; */
  border-radius:10px;
  border:none;
  /* font-size:1em; */
  position:relative;
  background:#0652DD;
  cursor:pointer;
  height:40px;
  width:100px;
  overflow:hidden;
  transition:transform 0.1s;
  z-index:1;
}
.addtocart:hover{
  transform:scale(1.1);
}
.pretext{
  color:#ffffff;
  background:#ff7200;
  position:absolute;
  top:1%  ;
  padding: %;
  left:1%;
  height:100%;
  width:100%;
  display:flex;
  justify-content:center;
  align-items:center;
  font-family: 'Quicksand', sans-serif;
}
i{
  margin-right:10px;
}
.done{
  background:#000000;
  position:absolute;
  width:100%;
  top:0;
  left:0;
  transition:transform 0.3s ease;

  transform:translate(-110%) skew(-40deg);
}
.posttext{
  background:#ff4040;
}
.fa-check{
  background:#ff3131;
}

  
  .product-discount-percent {
            font-size: 12px;
            color: #4caf50;
            margin-left: 8px;
            text-decoration: line-through;
        }

  html, body {
    height: 100%;
    width: 100%;
    margin: 0;
    font-family: 'Roboto', sans-serif;
  }
   
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px;
    display: flex;
  }
  /* }
  Notice that `.container` has been set to `display: flex` which will align the columns.
  
  Now let’s add some width to columns and `position: relative` the `.left-column`, because we will `position: absolute` the images. */
  /* Columns */
  .left-column {
    width: 65%;
    position: relative;
  }
   
  .right-column {
    width: 35%;
    margin-top: 60px;
  }
  /* Great! Let’s style the first column, which is `.left-column`.  This column has three images, three headphones in different colors. We’ll give them `opacity: 0` and also add a class `.active` on them with `opacity: 1`, which we’ll need it later in this tutorial.
  
    With Startup App and Slides App you can build unlimited websites using the online website editor which includes ready-made designed and coded elements, templates and themes
Low-Code Website Builders */
  /* Left Column */
  .left-column img {
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    transition: all 0.3s ease;
  }
   
  .left-column img.active {
    opacity: 1;
  }
  /* Style the `.right-colum` now.  Begin with `.product-description` where we describe the product. */
  /* Product Description */
  .product-description {
    border-bottom: 1px solid hsl(0, 100%, 99%);
    margin-bottom: 20px;
  }
  .product-description span {
    font-size: 12px;
    color: #ffffff;
    letter-spacing: 1px;
    text-transform: uppercase;
    text-decoration: none;
  }
  .product-description h1 {
    font-weight: 300;
    font-size: 52px;
    color: #ffffff;
    letter-spacing: -2px;
  }
  .product-description p {
    font-size: 16px;
    font-weight: 300;
    color: #ffffff;
    line-height: 24px;
  }
  /* Now, we need to style the product color configuration. */
  
  /* Here, we have three radio inputs, we’ll style them to look nice. Each input will have a color that pairs with the headphones color. We’re going to use `:checked` to add a checked icon on the checked radio input, `:checked` is an awesome feature which CSS provides. */

  /* Product Color */
  .product-color {
    margin-bottom: 30px;
  }
   
  .color-choose div {
    display: inline-block;
  }
   
  .color-choose input[type="radio"] {
    display: none;
  }
   
  
  
  /* Good! Now let’s style the `.cable-configuration` section. We have three buttons and a link. Let’s style their states and make them look nice. */
  /* Cable Configuration */
  .cable-choose {
    margin-bottom: 20px;
  }
   
  .cable-choose button {
    border: 2px solid #E1E8EE;
    border-radius: 6px;
    padding: 10px 20px;
    font-size: 14px;
    color: #126bdf;
    background-color: #fff;
    cursor: pointer;
    transition: all .5s;
  }
   
  .cable-choose button:hover,
  .cable-choose button:active,
  .cable-choose button:focus {
    border: 2px solid #000000;
    outline: none;
  }
   
  .cable-config {
    border-bottom: 1px solid #000000;
    margin-bottom: 2px;
  }
   
  .cable-config a {
    color: #358ED7;
    text-decoration: none;
    font-size: 12px;
    position: relative;
    margin: 10px 0;
    display: inline-block;
  }
   
  .cable-config a:before {
    content: "?";
    height: 15px;
    width: 15px;
    border-radius: 50%;
    border: 2px solid rgba(53, 142, 215, 0.5);
    display: inline-block;
    text-align: center;
    line-height: 16px;
    opacity: 0.5;
    margin-right: 5px;
  }
  /* One last thing to do is to style the last section of this column, which is `.product-price`. */
  /* Product Price */
  .product-price {
    display: flex;
    align-items: center;
  }
   
  .product-price span {
    font-size: 26px;
    font-weight: 300;
    color: #fcf7f7;
    margin-right: 20px;
  }
   
  .cart-btn {
    display: inline-block;
    background-color: #7DC855;
    border-radius: 6px;
    font-size: 16px;
    color: #FFFFFF;
    text-decoration: none;
    padding: 12px 30px;
    transition: all .5s;
  }
  .cart-btn:hover {
    background-color: #64af3d;
  }
  .product-discounted-price {
            color: #ff5722;
        }

        .product-original-price {
            font-size: 14px;
            text-decoration: line-through;
            color: hsl(0, 0%, 100%);
            margin-left: 8px;
        }

        .product-discount-percent {
            font-size: 12px;
            color: #4caf50;
            margin-left: 8px;
        }

        .img-image-item {
            height: 10px;
            width: 10px;

        }
  </style>
  
   @include('footer')
   {{-- @include('user.index') --}}
  {{-- @endsection  --}}