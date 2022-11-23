<?php

use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\frontend\SocialLoginController;
use App\Http\Controllers\frontend\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\ShippingAreaController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\WishListController;
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

/* Sub Sub Category */

/* Sub Sub Category Here */
Route::prefix('subSubCategory')->name('subSubCategory.')->group(function ()
{
    /* send ajax request data by this route */
    Route::get('/getData',[CategoryController::class,'getData'])->name('get.data');
   Route::get('/add', [CategoryController::class,'subSubcategory'])->name('add');

   Route::post('/store',[CategoryController::class,'subSubCategoryStore'])->name('store');

   Route::DELETE('delete/{deleteData:slug}',[CategoryController::class,'subSubCategoryDelete'])->name('delete');

   Route::GET('edit/{editDataToForm:slug}',[CategoryController::class,'editsubSubCategory'])->name('edit');

   Route::PUT('update/{updateDataPost:slug}',[CategoryController::class,'updatesubSubCategory'])->name('update');
});


/* Product Here */
Route::prefix('product/')->name('product.')->group(function(){
    Route::get('/add', [ProductController::class,'storeProduct'])->name('add');

    Route::get('fetch-sub-category/{id}',[ProductController::class,'fetchSubcategory'])->name('fetch.subCategory');
    //  Route::post('/store',[ProductController::class,'subCategoryStore'])->name('store');
    Route::post('/product_store',[ProductController::class,'productStore'])->name('store');

    Route::post('/getSubCategory',[ProductController::class,'getSubcategory'])->name('getSubcategory');

});

/* Coupon Here */

Route::prefix('/coupon')->name('coupon.')->group(function(){
    Route::get('/all',[CouponController::class,'allCoupon'])->name('all');
    Route::post('/add',[CouponController::class,'addCoupon'])->name('store');
    Route::get('/edit/{id}',[CouponController::class,'editCoupon'])->name('edit');
    Route::put('/update/{id}',[CouponController::class,'updateCoupon'])->name('update');
    Route::get('/delete/{id}',[CouponController::class,'deleteCoupon'])->name('delete');

    Route::get('status/{status}/{id}',[CouponController::class,'statusCoupon'])->name('status');
});

Route::prefix('shipping/')->name('ship.')->group(function(){

    Route::get('/all',[ShippingAreaController::class,'allShipDivision'])->name('division.all');
    Route::post('/add',[ShippingAreaController::class,'addShippDivision'])->name('division.store');
    Route::get('/edit/{id}',[ShippingAreaController::class,'editShippDivision'])->name('division.edit');
    Route::put('/update/{id}',[ShippingAreaController::class,'updateShippDivision'])->name('division.update');
    Route::get('/delete/{id}',[ShippingAreaController::class,'deleteShippDivision'])->name('division.delete');

    /* Shipping area of District */

Route::get('district/all',[ShippingAreaController::class,'allShipDistrict'])->name('district.all');
Route::post('district/add',[ShippingAreaController::class,'addShippDistrict'])->name('district.store');
Route::get('district/edit/{id}',[ShippingAreaController::class,'editShippDistrict'])->name('district.edit');
Route::put('district/update/{id}',[ShippingAreaController::class,'updateShippDistrict'])->name('district.update');
Route::get('district/delete/{id}',[ShippingAreaController::class,'deleteShippDistrict'])->name('district.delete');

/* Shipping Area Of State */

/* Combobox data send by ajax Request */
Route::get('get-district',[ShippingAreaController::class,'getDistrict'])->name('get.district');

Route::get('state/all',[ShippingAreaController::class,'allShipState'])->name('state.all');
Route::post('state/add',[ShippingAreaController::class,'addShippState'])->name('state.store');
Route::get('state/edit/{id}',[ShippingAreaController::class,'editShippState'])->name('state.edit');
Route::put('state/update/{id}',[ShippingAreaController::class,'updateShippState'])->name('state.update');
Route::get('state/delete/{id}',[ShippingAreaController::class,'deleteShippState'])->name('state.delete');
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

Route::get('cart/remove/{id}',[CartController::class,'cartRemove'])->name('cart.remove');

Route::get('allCart/remove/',[CartController::class,'allCartRemove'])->name('allCart.remove');
/* Check out Method */

});

Route::get('cart/checkout',[OrderController::class,'checkoutForm'])->name('cart.checkout.form');
Route::post('cart/checkout/info',[OrderController::class,'checkoutStore'])->name('cart.checkout.info');



Route::get('google/login',[SocialLoginController::class,'googleGetData'])->name('google.login');

Route::get('google/redirect',[SocialLoginController::class,'googleRedirect'])->name('google.redirect');

Route::controller(WishListController::class)->group(function(){

    Route::get('user/wishList/{id}','addToWishList')->name('user.wishlist');
    Route::get('user/show-wishLists','showWishlists')->name('user.show.wishlist');
    Route::get('user/removeWishList/{id}','removeWishList')->name('user.wishlist.remove');
});

Route::controller(CompareController::class)->group(function(){
    Route::get('/add-to-compare/{product_id}', 'addToCompare');

});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
