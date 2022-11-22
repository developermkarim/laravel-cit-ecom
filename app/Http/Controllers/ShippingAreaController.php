<?php

namespace App\Http\Controllers;

use App\Models\ShipDistrict;
use App\Models\ShipDivision;
// use App\Models\ShippingArea;
use App\Models\ShipState;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function storeOrUpdate($model,$requst)
    {

       $model->division_name = $requst->division_name;

       $model->save();

    }
    public function allShipDivision()
    {
        $divisions = ShipDivision::all();
        return view('backend.shippingArea.shippDivision',compact('divisions'));
    }

    public function addShippDivision(Request $req)
    {
        $req->validate([
            'division_name'=>'required|unique:ship_divisions,division_name,',
           ],
        [
            'division_name.unique' => 'Division Name must be unique',
        ]
        );

        $model = new ShipDivision;
        $this->storeOrUpdate($model,$req);
        return back();
    }

    public function editShippDivision($id)
    {
        $editeddivision =  ShipDivision::find($id);
        $divisions = ShipDivision::all();
        return view('backend.shippingArea.shippDivision',compact('editeddivision','divisions'));
    }
    public function updateShippDivision(Request $req)
    {
        $model = ShipDivision::find($req->update_id);
        $this->storeOrUpdate($model,$req);
        return back();
    }

    public function deleteShippDivision($id)
    {
       $deleteData = ShipDivision::find($id);
       if($deleteData->delete()){
        notify()->success('you have deleted coupon');
       }
       else{
        notify()->error('you have not deleted coupon');
       }

       return back();
    }

    /* District Method */

    public function storeOrUpdateDistrict($model,$requst)
    {

       $model->district_name = $requst->district_name;
       $model->division_id = $requst->division_id;

       $model->save();

    }

    public function allShipDistrict()
    {
        $districts = ShipDistrict::orderBy('id','desc')->get();
        $divisions = ShipDivision::orderBy('id','desc')->get();
        return view('backend.shippingArea.shippDistrict',compact('districts','divisions'));
    }

    public function addShippDistrict(Request $req)
    {
        $req->validate([
            'division_id'=>'required',
            'district_name'=>'required|unique:ship_districts,district_name,',
           ],
        [
            'district_name.unique' => 'District Name must be unique',
        ]
        );
        $model = new ShipDistrict();
        $this->storeOrUpdateDistrict($model,$req);
        return back();
    }

    public function editShippDistrict($id)
    {
        $editeddistrict =  ShipDistrict::find($id);
        $districts = ShipDistrict::orderBy('id','desc')->get();
        $divisions = ShipDivision::orderBy('id','desc')->get();
        return view('backend.shippingArea.shippDistrict',compact('editeddistrict','districts','divisions'));
    }
    public function updateShippDistrict(Request $req)
    {
        $model = ShipDistrict::find($req->update_id);
        $this->storeOrUpdateDistrict($model,$req);
        return back();
    }

    public function deleteShippDistrict($id)
    {
       $deleteData = ShipDistrict::find($id);
       if($deleteData->delete()){
        notify()->success('you have deleted coupon');
       }
       else{
        notify()->error('you have not deleted coupon');
       }

       return back();
    }

   /* State Method */


   /* State Ajax Response Method */

   public function getDistrict(Request $request)
   {
    $division_id = $request->division_id;

    $sendData = ShipDistrict::select('id','district_name')->where('division_id',$division_id)->get();

    return response($sendData);
   }

public function storeOrUpdateState($model,$requst)
{

   $model->state_name = $requst->state_name;
   $model->division_id = $requst->division_id;
   $model->district_id = $requst->district_id;

   $model->save();

}

public function allShipState()
{
    $states = ShipState::orderBy('id','desc')->get();
    $districts = ShipDistrict::orderBy('id','desc')->get();
    $divisions = ShipDivision::orderBy('id','desc')->get();
    return view('backend.shippingArea.shippState',compact('states','divisions','districts'));
}

public function addShippState(Request $req)
{
    $req->validate([
        'division_id'=>'required',
        'district_id'=>'required',
        'state_name'=>'required|unique:ship_states,state_name,',
       ],
    [
        'state_name.unique' => 'State Name must be unique',
    ]
    );
    $model = new ShipState();
    $this->storeOrUpdateState($model,$req);
    return back();
}

public function editShippState($id)
{
    $editedstate =  ShipState::find($id);
    $states = ShipState::orderBy('id','desc')->get();
    $divisions = ShipDivision::orderBy('id','desc')->get();
    $districts = ShipDistrict::orderBy('id','desc')->get();
    return view('backend.shippingArea.shippState',compact('editedstate','states','divisions','districts'));
}
public function updateShippState(Request $req)
{
    $model = ShipState::find($req->update_id);
    $this->storeOrUpdateState($model,$req);
    return back();
}

public function deleteShippState($id)
{
   $deleteData = ShipState::find($id);
   if($deleteData->delete()){
    notify()->success('you have deleted coupon');
   }
   else{
    notify()->error('you have not deleted coupon');
   }

   return back();
}


}
