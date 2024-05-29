<?php
namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\productcategory;
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
        //
         //
         $request->validate([
            'name'=>"required|min:2|max:100",
            'price'=>"required|min:2|max:100",
            // 'description'=>"required|min:2|max:1000",
            'discount'=>"required|max:100",
                ]);
        // $request->validate([
        //     'name'=>"required|min:3|max:40",
        //     'description'=>"required|min:3|max:40",

        // ]);

        $info=[
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'discount'=>$request->discount,

        ];
        
        $obj=product::create($info);
        if(count($request->category_id)>0){
            foreach($request->category_id as $cid){
                $pcinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
                productcategory::create($pcinfo);
            }
        }
        return redirect('/product')-> with('grt','data saved');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
   */
//     public function show(product $product)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(product $product)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, product $product)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(product $product)
//     {
//         //
//     }
// }


    