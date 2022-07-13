<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $category_data= Category::paginate(6);
        $blogs= Blog::latest()->paginate(4);
       $featured_blog =Blog::latest()->first();

        return view('welcome', compact('category_data', 'blogs','featured_blog'));
    }

}
