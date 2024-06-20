@extends('layouts.app')

@include('header')
<div class="abe">

    <div class="abc">
      <div class="op">
        <div class="row">
    @foreach ($data as $info)
                        <div class="col-4">
                            <div class="card">
                                @if ($info['photos'])
                                    @foreach ($info->photos as $img)
                                        <div class="image-gallery">
                                            <div title="image-item" id="photos_{{ $img['id'] }}">
                                                <img src="/photo/{{ $img['image'] }}" class="slide active" height="11%"width="10%">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $info['name'] }}</h5>
                                    <p class="card-text">{{ $info['description'] }}</p>
                                </div>
    
                                @if ($info['discount'] > 0)
                                    <p class="product-price">Final Price:
                                     <span class="product-discounted-price">
                                            ₹{{ $info['price'] - ($info['price'] * $info['discount']) / 100 }}
                                        </span>
                                        <span class="product-original-price">
                                            ₹{{ $info['price'] }}
                                        </span>
                                        <span class="product-discount-percent">{{ $info['discount'] }}% OFF</span>
                                    </p>
                                @else
                                    <ul class="product-price">
                                        ₹{{ $info['price'] }}
                                    </ul>
                                @endif
                                <div class="card-body">
                                    {{-- <a href="#" class="btn btn-primary">Add To Cart</a> --}}
                                    <a href="productpag/{{ $info['id'] }}" class="btn btn-success">VIEW</a>
                                </div>
                            </div>
                        </div>
        @endforeach
      </div>
        </div>
      </div>
    </div>
    
      <style>
        .card-body{
            
        }            .op {
                background: #000
                display: flex;
                justify-content: space-around;
                margin: 1px;
            }
    /
            .abc {
                display: table;
                clear: both;
                width: 150;
                height: 1%;
                box-shadow: blue;
                background: rgb(0, 0, 0);
          -webkit-box-shadow: 0 0 5px #000;
                box-shadow: 0 0 5px #000; 
            }
    
            /* css for price */
            .slide {
                display: block;
            }
    
            .slide.active {
                display: table;
                clear: both;
                width: 50%;
                height: 50%;
            }
    
            /* .row {
                display: flex;
                justify-content: space-around;
                margin: 10px;
            } */
    /* 
            .product-price {
                font-size: 16px;
                font-weight: bold;
                margin: 0 0 16px;
                margin-left: 8px;
    
            } */
    
            .product-discounted-price {
                color: #ff5722;
            }
    
            .product-original-price {
                font-size: 14px;
                text-decoration: line-through;
                color: #757575;
                margin-left: 8px;
            }
    
            .product-discount-percent {
                font-size: 12px;
                color: #4caf50;
                margin-left: 10px;
            }
    
            .img-image-item {
                height: 10px;
                width: 10px;
    
            }
        </style>
      
@include('footer')