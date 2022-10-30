<?php

use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('admin',[HomeController::class,'dashboard'])->name('dashboard');


/* Brand Routes Here */

Route::get('brands',[BrandController::class,'index'])->name('pd.brand');

Route::post('brand-store',[BrandController::class,'brandStore'])->name('brand.store');
// Route::get('brand-data',[BrandController::class,'select'])->name('brand.data');
Route::PUT('brand-update/{brandData:slug}',[BrandController::class,'updateBrand'])->name('brand.update');

Route::get('brand-edit/{editedBrand:slug}',[BrandController::class,'editBrand'])->name('brand.edit');
Route::DELETE('delete/{deletedData:slug}',[BrandController::class,'delete'])->name('brand.delete');


Route::prefix('/category')->name('category.')->group(function(){
Route::get('add',[CategoryController::class,'categoryAdd'])->name('add');
Route::post('/store',[CategoryController::class,'categoryStore'])->name('store');
Route::get('edit/{editedCategory:slug}',[CategoryController::class,'editCategory'])->name('edit');

Route::PUT('update/{updatedCategory:slug}',[CategoryController::class,'update'])->name('update');

Route::DELETE('/delete/{deletedCategory:slug}',[CategoryController::class,'delete'])->name('delete');
});

/* Sub Category Here */
Route::prefix('subCategory')->name('subCategory.')->group(function ()
{
   Route::get('/add', [CategoryController::class,'categoryToSubCate'])->name('add');

   Route::post('/store',[CategoryController::class,'subCategoryStore'])->name('store');

   Route::DELETE('delete/{deleteData:slug}',[CategoryController::class,'subCategoryDelete'])->name('delete');

   Route::GET('edit/{editDataToForm:slug}',[CategoryController::class,'editSubCategory'])->name('edit');

   Route::PUT('update/{updateDataPost:slug}',[CategoryController::class,'updateSubCategory'])->name('update');
});

/* Product Here */
Route::prefix('product/')->name('product.')->group(function(){
    Route::get('/add', [ProductController::class,'storeProduct'])->name('add');

    Route::get('fetch-sub-category/{id}',[ProductController::class,'fetchSubcategory'])->name('fetch.subCategory');
    //  Route::post('/store',[ProductController::class,'subCategoryStore'])->name('store');
    Route::post('/product_store',[ProductController::class,'productStore'])->name('store');

    // Route::DELETE('delete/{deleteData:slug}',[ProductController::class,'subCategoryDelete'])->name('delete');
 
    // Route::GET('edit/{editDataToForm:slug}',[ProductController::class,'editSubCategory'])->name('edit');
 
    // Route::PUT('update/{updateDataPost:slug}',[ProductController::class,'updateSubCategory'])->name('update');
    Route::post('/getSubCategory',[ProductController::class,'getSubcategory'])->name('getSubcategory');
});





/* Front End Routes Here */
Route::get('/',[HomePageController::class,'home'])->name('home');