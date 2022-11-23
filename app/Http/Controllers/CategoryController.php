<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function uploadImage($requestImage)
    {
        if($requestImage->hasFile('categoryImage')){
        $extension = $requestImage->categoryImage->extension();
        $imageName = 'category-' . $requestImage->slug . '.'. $extension;
        $imagePath = $requestImage->categoryImage->storeAs('category/',$imageName,'public');
        $image_uri = env('APP_URL') . '/storage/' . $imagePath;

        return ['imagepath'=>$imageName,'imageUri'=>$image_uri];
    }

    }

    /* This is for Refactoring Facility */
    public function storeCategoryData($request, $category, $imagedata)
    {
       $category->title = $request->title;
       $category->slug = $request->slug;

       if($request->hasFile('categoryImage')){
        $category->image = $imagedata['imagepath'];
        $category->image_uri = $imagedata['imageUri'];
       }

       $category->save();
    }

    public function categoryAdd()
    {
        $category = Category::all();
      return view('backend.category.add',compact('category'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'slug' => 'required',

        ]
        );


        $image = $this->uploadImage($request);

        $category = new Category();

        $this->storeCategoryData($request,$category,$image);
        $category->save();
        return back();
       }

       public function editCategory(Category $editedCategory)
       {
        $category = Category::all();
        return view('backend.category.add',compact('editedCategory','category'));
       }


       public function update(Request $request,Category $updatedCategory)
       {

        $request->validate([

            'title' => 'required',
            'slug' => 'required',
        ]
        );


        $path = 'category/' . $updatedCategory->image;
        if($request->hasFile('categoryImage')){

        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }

    else{
     return redirect()->route('category.add');
     }



        $image = $this->uploadImage($request);
        $this->storeCategoryData($request,$updatedCategory,$image);
        notify()->success('Your Brand added successfully!');
        return redirect()->route('category.add');



     }

       public function delete(Category $deletedCategory)
       {
        $path = 'category/' . $deletedCategory->image;
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);

            $deletedCategory->delete();
           notify()->success('Your category successfully Deleted');

        }

        return redirect()->route('category.add');

       }

       /* Sub Category Methods Here Starting  */

       /* Sub Category Refactoring For DRY Facilities */

       public function subCatImage($request)
       {
        if($request->hasFile('subCategoryImage')){

            $extension = $request->subCategoryImage->extension();
            $image = 'sub_category-' . $request->slug . '.' . $extension;
            $imagePath = $request->subCategoryImage->storeAs('subCategory/',$image,'public');
            $image_uri = env('APP_URL') . '/storage/' . $imagePath;
            return ['image'=>$image,'imageUrl'=>$image_uri];
        }

       }

       public function subStoreData($request, $sub_cat,$sub_cat_image)
       {
        // $image = $this->subCatImage($request);
       $sub_cat->title = $request->title;
       $sub_cat->slug = $request->slug;
       $sub_cat->category_id = $request->categoryTitle;
       if($request->hasFile('subCategoryImage')){

        $sub_cat->image =  $sub_cat_image['image'];
       $sub_cat->image_uri = $sub_cat_image['imageUrl'];

       }

       $sub_cat->save();

       }

       public function categoryToSubCate()
       {
        $categoryIdTitle = Category::select('id','title')->get();
        $subCategory = SubCategory::with('category')->get();
        // dd($subCategory[0]->title);
        return view('backend.category.subcategory.add', compact('categoryIdTitle','subCategory'));

       }


/*  public function subCategory()
{
    $subCategory = SubCategory::all();
// dd($subCategory);
    return view('backend.category.subcategory.add',compact('subCategory'));
} */

public function subCategoryStore(Request $request)
{
    $request->validate([

        'title' => 'required',
        'slug' => 'required',

    ]
    );
    $image = $this->subCatImage($request);
    $subCategory = new SubCategory();
    // dd($subCategory);
    $this->subStoreData($request,$subCategory,$image);
    return back();

}

public function editSubCategory(SubCategory $editDataToForm)
{
    $categoryIdTitle = Category::select('id','title')->get();
        $subCategory = SubCategory::with('category')->get();

       /*  $categoriesData = Category::select('id','title')->get();
        $subCategories = SubCategory::with('category')->get(); */
        return view('backend.category.subcategory.add', compact('categoryIdTitle','subCategory','editDataToForm'));
}

public function updateSubCategory(Request $request, SubCategory $updateDataPost)
{
    $path = 'subcategory/' . $updateDataPost->image;
    if($request->hasFile('subCategoryImage')){
        if(Storage::disk('public')->exists($path)){
        Storage::disk('public')->delete($path);
        }

    }else{
        return redirect()->route('subCategory.add');
    }

    $image = $this->subCatImage($request);
    $this->storeCategoryData($request,$updateDataPost,$image);
    return back();

}

public function subCategoryDelete(SubCategory $deleteData)
{
    $path = 'subcategory/' . $deleteData->image;
   if(Storage::disk('public')->exists($path)){
    Storage::disk('public')->delete($path);
    $deleteData->delete();
    notify()->success('Data Deleted Successfully');

   }

   return redirect()->route('subCategory.add');

}


  /* Sub Sub Category Methods Here */
/*   if($request->hasFile('subCategoryImage')){

    $extension = $request->subCategoryImage->extension();
    $image = 'sub_category-' . $request->slug . '.' . $extension;
    $imagePath = $request->subCategoryImage->storeAs('subCategory/',$image,'public');
    $image_uri = env('APP_URL') . '/storage/' . $imagePath;
    return ['image'=>$image,'imageUrl'=>$image_uri];
} */

public function getData(Request $request)

{
    $category_id = $request->category_id;

    $subCategories = SubCategory::select('id','title')->where('category_id',$category_id)->get();
    //d($subCategories);
    return response($subCategories);
}

  public function subSubCateImage($request)
  {

    if($request->hasFile('subSubCategory_image')){

       /*  $extension = $request->file('subSubCategoryImage')->extension(); */
       $extension = $request->subSubCategory_image->extension();
      
       $imageName = $request->slug. time() . '.' . $extension;
        $imageStore = $request->subSubCategory_image->storeAs('subSubCategory/', $imageName,'public');
        $image_uri = env('APP_URL') . '/storage/' . $imageStore;

        return ['image'=>$imageName,'image_uri'=>$image_uri];
    }


  }

  public function subSubStoredata($request,$model,$imageStore){
        
$request->validate([

'category_id'=>'required',
'sub_category_id' => 'required',
'subSubCategory_image'=> 'required|mimes:png,jpg,webp,jpeg',
'title' => 'required|unique:sub_sub_categories,title,',
'slug' => 'required|unique:sub_sub_categories,slug,',

]);

    $model->slug = str($request->slug) ;
    $model->sub_category_id = $request->sub_category_id	;
    // $model->SubCategory_id = $request->sub_category_id;
    $model->title = $request->title;
    if($request->hasFile('subSubCategory_image')){
        $model->subSubCategory_image = $imageStore['image'];
        $model->subSubCategory_image_uri = $imageStore['image_uri'];

    }


}

public function subSubcategory()
{
    $allSubCategories = SubSubCategory::orderBy('id','desc')->get();
    $allCategories = Category::all();
   return view('backend.category.subcategory.subSubCategory.add',compact('allSubCategories','allCategories'));
}

public function subSubCategoryStore(Request $request)
{
 $subSubModel = new SubSubCategory();
 $categoryImage = $this->subSubCateImage($request);
 $this->subSubStoredata($request,$subSubModel,$categoryImage);

 $subSubModel->save();
 return back();
}

public function editsubSubCategory(SubSubCategory $editDataToForm)
{
    $allSubCategories = SubSubCategory::orderBy('id','desc')->get();
    $allCategories = Category::all();
    return view('backend.category.subcategory.subSubCategory.add',compact('allCategories','editDataToForm','allSubCategories'));
    
}

}
