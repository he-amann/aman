<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = product::all(); 
        return view('user.index', compact('data'));

    }

    public function productpag($id)
    {
        //
        $product=product::find($id);
        return view('user.productpag',compact('product'));
    }
    

    // public function addtocart($id)
    // {
    //     //
    //    $item=new card();
    //    $item->productid=$data->input(id);
    // }

}
