<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function store(Request $request){
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->status=$request->status;

        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $blog->profile_image = $filename;

        }
        $blog->category_id=$request->category_id;
        $blog->save();
        return redirect()->route('blog.index')->with('message','ADDED SUCCESSFULLY ! ');

    }

    public function  create(){

        $category_data=Category::all();
        return view('blog.create', compact('category_data'));
    }
    public function index()
    {
        $data=Blog::with('category')->paginate(10);
        return view('blog.index',compact('data'));
    }
    public function edit($id)
    {

        $category= Category::all();
        $data=Blog::find($id);
        return view('blog.edit',compact('data','category'));
        return redirect()->route('blog.index');
    }
    public function update (Request $request,$id)
    {
         $blog=Blog::find($id);
         $blog->title=$request->title;
         $blog->description=$request->description;
         $blog->status=$request->status;
         if($request->hasfile('profile_image'))
         {
             $destination = 'uploads/products/'.$blog->profile_image;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }
             $file = $request->file('profile_image');
             $extention = $file->getClientOriginalExtension();
             $filename = time().'.'.$extention;
             $file->move('uploads/products/', $filename);
             $blog->profile_image = $filename;
         }
         $blog->category_id=$request->category_id;

         $blog->update();
         return redirect()->route('blog.index')->with('message','Update Successfully !');
}
public function delete($id){

    $blog=Blog::find($id);
          $blog->delete();
    return redirect()->route('blog.index')->with('message','Delete Successfully ! ');
}
public function show($id){

    $category_data=Category::all();
    $blog=Blog::with('category')->find($id);
    return view('blog.show', compact('blog','category_data'));
}
}
