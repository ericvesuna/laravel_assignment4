<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(3);
        

        
        # $categoryName = "electronics";
        # $prod=Product::whereHas('category', function($q) use($categoryName){
        #     $q->where('category_name',$categoryName);
        #     })->get();
     
        # dd($cat);

       


        return view('pages.list_product',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all(); 
        return view('pages.create_product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
  
       $product= new Product;


        if($request->hasFile('product_image')) {
          $filename=$request->file('product_image')->getClientOriginalName();
          
          $extension = $request->file('product_image')->getClientOriginalExtension();
          
          $filename_store = time().$filename; 

          $image_store = $request->file('product_image')->storeAs('public/images', $filename_store); 
          
          $product->product_image = $filename_store;

        }
        
            $product->product_name=$request->get('product_name');
            $product->product_price=$request->get('product_price');
            $product->category_id=$request->get('category');
            
            $product->save();

            if($product) {
                return redirect()->route('productlist')->with('status','Product Added');
            }        
            else {
               return redirect()->route('productlist')->with('status','Product Failed');     
            }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::with('category')->paginate(3);
        # $categoryName = "electronics";
        # $prod=Product::whereHas('category', function($q) use($categoryName){
        #     $q->where('category_name',$categoryName);
        #     })->get();
     
        # dd($cat);
        return view('pages.list_product',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product_id = $request->get('id');
        $product = Product::where('id',$product_id)->first();
        $categories=Category::all(); 

        return view('pages.edit_product',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product_name=$request->get('product_name');
        $product_price=$request->get('product_price');
        $category_id=$request->get('category');
        
        $product=Product::find($id);

        if($request->hasFile('product_image')) {
          
          $filename=$request->file('product_image')->getClientOriginalName();
          
          $extension = $request->file('product_image')->getClientOriginalExtension();
          
          $filename_store = time().$filename; 

          $image_store = $request->file('product_image')->storeAs('public/images', $filename_store); 
          
          $product->product_image = $filename_store;
        }
          
          
          $product->product_name = $product_name;
          $product->product_price = $product_price;
          $product->category_id = $category_id;

          $product->save();

          if($product) {
            return redirect()->route('productlist')->with('status','Product Updated');
          }        
          else {
            return redirect()->route('productlist')->with('status','Product Update Failed');     
          }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_id = $request->get('id');


        $product = Product::where('id',$product_id)->first();
        
        $image_name = $product->product_image;

        if($image_name != null) {
          Storage::delete('public/images/'.$image_name);
        }

        
        $product->delete();



        if($product) {
            return redirect()->route('productlist')->with('status', 'Deleted Successfully');
        }

        else {
           return redirect()->route('productlist')->with('status', 'Deleting Failed');   
        } 

    }


    public function destroy_all(Request $request) {
        
        $product_id = $request->get('checkbox');
         if(!$product_id) {
         return redirect()->route('productlist')->with('status', 'Please Select Atleast One Product');
        }
         
        $product = Product::whereIn('id',$product_id)->get();
       
        foreach($product as $products) {
                $image_name = $products->product_image;           
          Storage::delete('public/images/'.$image_name);
 
        }
        
                $product = Product::whereIn('id',$product_id)->delete();

        if($product) {
            return redirect()->route('productlist')->with('status', 'Multiple Delete Successfull');
        }

        else {
          return redirect()->route('productlist')->with('status', 'Multiple Deleting Failed');   
        } 
 
    }

}
