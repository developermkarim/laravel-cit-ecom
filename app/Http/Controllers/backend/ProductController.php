<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /* Refactoring Data */

    public function thumbnailStore($request)
    {
        //* thumbnail Image Process
        if($request->hasFile('thumbnail_name')){

            $extension = $request->thumbnail_name->extension();
            $image = str($request->title)->slug() . '-product.' . $extension;
           $image_path = $request->thumbnail_name->storeAs('product',$image,'public');
            $imageUri = env('APP_URL') . '/storage/' . $image_path;
    
    
            return ['thumb_name'=>$image,'thumbnail_uri'=> $imageUri];
        }
       
    }


    /* Thumbnail Image Gallery Refactoring */
    public function gallery_images($request, $productId)
    {
        $galleryImages = $request->product_gallery_images;
        foreach ($galleryImages as $gall_Img) {
            $extension = $gall_Img->extension();
                $gall_image = str($request->title)->slug() . uniqid().'-product.' . $extension;
               $image_path = $gall_Img->storeAs('product',$gall_image,'public');
                $gallery_uri = env('APP_URL') . '/storage/' . $image_path;
        
                $galleryImageStore = new ProductImage();
                $galleryImageStore->product_id = $productId;
                $galleryImageStore->product_name = $gall_image;
                $galleryImageStore->product_uri = $gallery_uri;
                $galleryImageStore->save();
            }
    }

   public function storeProduct()
   {
    $categories = Category::select('id','title')->get();
    $brands = Brand::select('id','title')->get();
    // dd($categories);
    return view('backend.product.add',compact('categories','brands'));
   }

   /* This is for Subcategory in jax */

   public function fetchSubcategory($id)
   {
   
    $sub_category = SubCategory::where('category_id',$id)->select('id','title')->get();
    if(count($sub_category) > 0){
        return $sub_category;
    }
    else{
        return 'No Subcategory is available';
    }
   
  
   }

   public function productStore(Request $request) 
   {
    // dd($request->product_gallery_images); 
  /*   $result = $this->thumbnailStore($request);
    dd($result);  */
    //   dd($request->all());
    // dd($request->slug ? str($request->slug)->slug() : str($request->title)->slug());
    $thumbnail = $this->thumbnailStore($request);
    //   dd($thumbnail);
    $product = new Product();
    $product->title = $request->title;
    $product->slug = $request->slug ? str($request->slug)->slug() : str($request->title)->slug();
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->status = $request->stock;
    $product->category_id = $request->category;
    $product->sub_category_id = $request->subCategory;
    $product->brand_id = $request->brand;
    $product->start_date = $request->start_date;
    $product->end_date = $request->end_date;
    $product->product_code = $request->product_code;
    $product->short_detail = $request->short_detail;
    $product->long_detail = $request->long_detail;
    $product->thumbnail_uri = $thumbnail['thumbnail_uri'];
    $product->thumbnail_name = $thumbnail['thumb_name'];
    $product->long_detail = $request->long_detail;
    $product->video_uri = $request->video_uri;
   
    $product->save();
    // dd($product);

    $this->gallery_images($request,$product->id);
    return back();
    } 

   }

  

