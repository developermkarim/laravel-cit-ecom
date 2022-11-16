<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_encode;

class HomePageController extends Controller
{
    public function index()
    {
        

        $categories = Category::has('product')->with('subCategory','product')->get();
      

      /*  Role::create(['name'=>'admin']);
       Role::create(['name'=>'user']);
       Role::create(['name'=>'product Manager']); */
       
        return view('frontend.index',compact('categories'));
    }

    public function productView($slug,$id= null)
    {


    $productShow = Product::with('product_img')->where('slug',$slug)->first();

    //   dd($productShow->product_img);
    return view('frontend.product.product-show',compact('productShow'));



    }

     public function shop()
    {
        // $categories = Category::has('product')->with('subCategory','product')->get();
        // dd($categories);
        return view('frontend.product.product-shop');
    } 

    public function shopFilter(Request $request,$filterCategory = null)
    {
        $selectedCategory = $filterCategory;
        // dd($filterCategory);
        $sorting = $request->sorting;
        $sortingValue = str($sorting)->explode(',');
        // dd($sortingValue);
        $categories = Category::with('subCategory')->get();

        $brand = Brand::all();
        //* PRODUCTS
    
        $query = Product::query();
        if($request->startPrice && $request->endPrice){
            $query->where('price','>=',$request->startPrice)->where('price','<=',$request->endPrice);
        }

        if($selectedCategory){
            $query->where('category_id',$selectedCategory)->orWhere('sub_category_id',$selectedCategory);
        }
        if($sorting){
            $query->orderBy($sortingValue[0],$sortingValue[1]);
        }
        
        $products = $query->get();
        return view('frontend.product.product-shop', compact('categories','products','brand'));

    }

    public function searchable(Request $request)
    {
        $searchValue = $request->searchVal;
        
         if($searchValue){
            $result = Product::select('id','title','slug')->where('title','LIKE','%'. $searchValue . '%')->get();
            return json_encode($result);
         }
         else{
            $result2 = "NO Data Found";
            return response($result2,404);
         }
         
    }


    public function cart()
    {
        return view('frontend.cart.cart');
    }

   

}
