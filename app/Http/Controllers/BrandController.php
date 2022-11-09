<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
       
        return view('backend.brand.index', compact('brands'));
    }


    public function imageUpload($request)
    {
       $extension = $request->brandImage->extension();
       $image = 'brand-' . $request->slug . '.' . $extension;
        $storePath = $request->brandImage->storeAs('brand/' , $image,'public');
        $imageUrl = env('APP_URL') . '/storage/' . $storePath;

        return ['image'=>$image, 'image_url'=> $imageUrl];
    }

    public function brandStore(Request $request)
    {

       
        $request->validate([
            'title'=> 'required',
            'slug'=> 'unique:brands,slug', //unique:table,column,except,id'
             'brandImage'=>'required|mimes:png,jpg,jpeg,webp,gif',
        ],
    [
        'title'=>'title must be valid',
        'brandImage'=> 'only jpg, jpeg or png are allowed to upload',
        'slug'=>'slug must be unique',
    ]
    );
   
   

    $imageFunc = $this->imageUpload($request);


    $brand = new Brand;
   

    $this->storeBrandData($request, $brand, $imageFunc);
    notify()->success('Your Brand added successfully!');
   
       return back();

    }

public function editBrand(Brand $editedBrand)
{
    

    $brands = Brand::all();

    return view('backend.brand.index', compact('editedBrand','brands'));
}


public function updateBrand(Request $request, Brand $brandData)
{
    $path = 'brand/' . $brandData->brand_img;
 
   
    if($request->hasFile('brandImage')){
       

        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }


        $ImageFunc = $this->imageUpload($request);

        $this->storeBrandData($request, $brandData, $ImageFunc);
        notify()->success('Your Brand added successfully!');
        return redirect()->route('pd.brand');

    }
    else{
        return redirect()->route('pd.brand');

    }
    
}



/* Refactoring Function for DRY code */

public function storeBrandData($request, $brand, $brandImageData)
{
    $brand->title = $request->title;
    $brand->slug = $request->slug;

    if($request->hasFile('brandImage')){

        $brand->brand_img = $brandImageData['image'];
        $brand->image_uri = $brandImageData['image_url'];
    }
    $brand->save();
}



public function delete(Brand $deletedData)
{
    // $brand = Brand::find();
    $deletedData->delete();
    notify()->success('Your Brand added successfully!');
    return redirect()->route('pd.brand');
   
}


}