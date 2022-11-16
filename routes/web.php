<?php

use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\SocialLoginController;
use App\Http\Controllers\frontend\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\frontend\OrderController;
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

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth','role:admin|product-manager'])->group(function(){


Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');


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

    Route::post('/getSubCategory',[ProductController::class,'getSubcategory'])->name('getSubcategory');

});

});

/* Front End Routes Here */
Route::get('/',[HomePageController::class,'index'])->name('home');
Route::get('/cart',[HomePageController::class,'cart'])->name('cart');

Route::get('/product_show/{slug}',[HomePageController::class,'productView'])->name('product.show');
 
//  Route::get('shop/',[HomePageController::class,'shop'])->name('product.shop');

Route::get('/shopFilter/{filterCategory?}',[HomePageController::class,'shopFilter'])->name('product.shopFilter');
Route::post('search/',[HomePageController::class,'searchable'])->name('product.search');

/* User Auth Routes */
Route::prefix('user/')->name('user.')->group(function(){

    Route::get('/login',[UserAuthController::class,'login'])->name('login');
    Route::post('createLogin',[UserAuthController::class,'create'])->name('create');

    Route::get('/register',[UserAuthController::class,'register'])->name('register');
Route::post('createRegister',[UserAuthController::class,'createRegister'])->name('create.register');

/* Cart and Cart Item of Product */

Route::get('cart/{id}',[CartController::class,'addToCart'])->name('product.cart');

Route::get('cartList/',[CartController::class,'cartLists'])->name('cart.list');

Route::get('dropDowncartList/',[CartController::class,'dropdownCart'])->name('dropdown.cart.list');

Route::get('cart/remove/{id}',[CartController::class,'cartRemove'])->name('cart.remove');

Route::get('allCart/remove/',[CartController::class,'allCartRemove'])->name('allCart.remove');
/* Check out Method */

});

Route::get('cart/checkout/',[OrderController::class,'checkout'])->name('cart.checkout');



Route::get('google/login',[SocialLoginController::class,'googleGetData'])->name('google.login');

Route::get('google/redirect',[SocialLoginController::class,'googleRedirect'])->name('google.redirect');



