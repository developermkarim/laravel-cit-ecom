<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        $categories = Category::with('subCategory')->get();
        //  dd($categories[0]->subCategory);
      
        return view('layouts.frontend',compact('categories'));
    }
}
