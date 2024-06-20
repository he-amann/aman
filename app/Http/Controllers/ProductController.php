<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\productcategory;
use App\Models\productmedia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('product.index',['data'=>product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         //
         $cdata=category::all('id','name');
         return view('product.create',compact('cdata'));
     }
 
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $info=[
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'discount'=>$request->discount,

        ];
        $obj=product::create($info);
        if(count($request->category_id)>0)
        {
            foreach($request->category_id as $cid)
            {
                $pcinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
                productcategory::create($pcinfo);
            }
        }
    foreach($request->photo as $image)
    {
        $filename=[];
        $imgname=$image->getclientOriginalName();
        $image->move(public_path('photo'),$imgname);
        //$filename[]=$imgname;
        $isave=[
            'image'=>$imgname,
            'product_id'=>$obj->id,
        ];
        productmedia::create($isave);
    }
    return redirect('/product');
    }



        


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
        // return view('/product',['data'=>product::all()]);
         //
         $catagory=array_column($product->allcategory->toarray(),'category_id');
         return view('product.edit',['info'=>$product,'cdata'=>category::all(['id','name']),'category'=>$catagory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->discount=$request->discount;
        $product->Save();
        return redirect('/product')->with('grt','Data Updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
    $product->find($product->{'id'})->delete();
    return redirect('/product')->with('grt, data deleted successfully');
    }
    public function imagedelete($id)
    {
       $img=productmedia::find($id);
      // unlink("photo/".$img['image']);
       $img->delete();
    }


}