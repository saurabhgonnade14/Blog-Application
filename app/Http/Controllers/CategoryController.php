<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request){
        $categoy=new Category();
        $categoy->name=$request->name;
        $categoy->status=$request->status;
        $categoy->save();
        return redirect()->route('category.index')->with('message','Added Successfully ! ');

    }
    public function index()
    {
        $data=Category::paginate(10);
        return view('category.index',compact('data'));
    }
    public function edit($id)
    {
        $data=Category::find($id); 
        return view('category.edit',compact('data'));
    }
    public function update (Request $request,$id)
    {
         $category=Category::find($id);
         $category->name=$request->name;
         $category->status=$request->status;
         $category->update();
         return redirect()->route('category.index')->with('message','Update Successfully !');
}
public function delete($id){

    $category=Category::find($id);
          $category->delete();
    return redirect()->route('category.index')->with('message','Delete Successfully ! ');
}}

