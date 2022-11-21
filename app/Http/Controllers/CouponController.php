<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function storeOrUpdate($model,$para)
    {
        $para->validate([

            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
        ],
    [
            'coupon_name.unique'=>'coupon name must unique',     
    ]);

    // $model = $table;
    $model->coupon_name = $para->coupon_name;
    $model->coupon_discount = $para->coupon_discount;
    $model->coupon_validity = $para->coupon_validity;
     $model->save();
    }

    public function allCoupon()
    {

        $coupons = Coupon::all();
        return view('backend.coupon.coupon',compact('coupons'));
    }

    public function addCoupon(Request $request)
    {
        $request->validate(['coupon_name'=>'unique:coupons,coupon_name,']);

        $insertModel = new Coupon();
        $result =   $this->storeOrUpdate($insertModel,$request);
        if($result){
            notify()->success('you have Inserted coupon');
        }
        else{
            notify()->error('Sorry,you have not Inserted coupon');
        }
        return back();
    }

    /* Edit Method  */
    public function editCoupon($id)
    {
        $editedCoupon = Coupon::find($id)->first();
        $coupons = Coupon::all();
        return  view('backend.coupon.coupon',compact('editedCoupon','coupons'));
    }
    /* Update Method  */

    public function updateCoupon(Request $request)
    {
        $update_id = $request->update_id;
        $update = Coupon::find($update_id)->first();
       $result =  $this->storeOrUpdate($update,$request);
        if($result){
            notify()->success('you have updated coupon');
        }
        else{
            notify()->error('Sorry,you have not updated coupon');
        }
       
        return back();
        // dd($update);
    }

    public function deleteCoupon($id)
    {
       $deleteData = Coupon::find($id);
       if($deleteData->delete()){
        notify()->success('you have deleted coupon');
       }
       else{
        notify()->error('you have not deleted coupon');
       }

       return back();
    }

    public function statusCoupon(Request $request,$status,$id)
    {
       $updateStatus = Coupon::find($id);
       $updateStatus->status = $status;
       if($updateStatus->save()){

    //   $request->session()->with;
    return back();
       }
    }
}
