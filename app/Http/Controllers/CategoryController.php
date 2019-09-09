<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id')->paginate(3);


        return view('pages.list_category',compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
     /*
         $this->validate($request,[
         	'category_name'=>'required|unique:categories|alpha',
         	]);
*/

            $category= new Category;

            $category->category_name=$request->get('category_name');

            $category->save();
             

           if($category)
            {
              return redirect()->route('categorylist')->with('status', 'Added Successfully');
            }

           else
            {
              return redirect()->route('categorylist')->with('status', 'Adding Failed');   
            } 
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
    public function edit(Request $request)
    {
        $cat_id = $request->get('id');
        $category = Category::where('id',$cat_id)->first();

        return view('pages.edit_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(CategoryRequest $request, $id)
    {


         $this->validate($request,[
            'category_name'=>'required|alpha|unique:categories,category_name,'.$id,
            ]);



     $cat_name = $request->get('category_name');

    // $category = Category::where('id',$id)->update(['category_name' => $cat_name]); 

        $category = Category::find($id);

        $category->category_name = $cat_name;

        $category->save();

        if($category)
            {
              return redirect()->route('categorylist')->with('status', 'Updated Successfully');
            }

           else
            {
              return redirect()->route('categorylist')->with('status', 'updating Failed');   
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
        $cat_id = $request->get('id');
  
        $category = Category::where('id', $cat_id)->delete();

        if($category)
            {
              return redirect()->route('categorylist')->with('status', 'Deleted Successfully');
            }

           else
            {
              return redirect()->route('categorylist')->with('status', 'Deleting Failed');   
            } 
 
    }

    public function destroy_all(Request $request)
    {


        $cat_id = $request->get('checkbox');


         if(!$cat_id) {
         return redirect()->route('productlist')->with('status', 'Please Select Atleast One Category');
        }

  
        $category = Category::whereIn('id', $cat_id)->delete();

        if($category) {
            return redirect()->route('categorylist')->with('status', 'Deleted Successfully');
        }

           else
            {
              return redirect()->route('categorylist')->with('status', 'Deleting Failed');   
            } 
 
    }
}
