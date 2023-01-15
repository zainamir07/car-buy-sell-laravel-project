<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('brand_id', 'desc')->paginate(5);
        $data = compact('brands');
        return view('admin.brands')->with($data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
        ]);
   
        if($validator->fails()){
          return response()->json(['errors'=> $validator->messages()]);
        }else{
           
          $brand = new Brand;
          $brand->brand_name = $request['brand_name'];
          $brand->save();
          return response()->json(['success'=> 'Added Successfully']);
   
        }
    }

    public function brand_status_check(Request $request){
      $brand_id = $request->id;
      $brand = Brand::find($brand_id);
      // return response()->json([$category]);
      if($brand != ""){
        $brand->brand_status = $request->status;
        $brand->update();
         return response()->json(['success'=> 'Update Successfully']);
        }else{
         return response()->json(['errors'=> 'Something Went Wrong']);
        }
    }

    public function admin_brand_edit(Request $request){
        // return response()->json([$request->all()]);
        $brand_id = $request['brand_id'];
        $brand = Brand::find($brand_id);
        return response()->json([
          'brand' => $brand,
      ]);
 }

 public function admin_brand_update($id, Request $request){
  // return response()->json([$request->all()]);
  $validator = Validator::make($request->all(), [
    'editbrand_name' => 'required',
]);
 
if($validator->fails()){
  return response()->json(['errors'=> $validator->messages()]);
}else{
   
  $brand = Brand::find($id);
  $brand->brand_name = $request['editbrand_name'];
  $brand->update();
  return response()->json(['success'=> 'Brand Updated Successfully']);
}
}

public function admin_brand_delete($id){
  $brand = Brand::find($id);
  $brand->delete();
  if($brand){
     return redirect('admin/brands');
  }else{
     return redirect('admin/brands');
  }
  }



}
