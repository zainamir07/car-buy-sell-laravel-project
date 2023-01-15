<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CarModels;
class ModelController extends Controller
{
    public function index(){
        $models = CarModels::orderBy('model_id', 'desc')->paginate(5);
        $brands = Brand::all();
        $data = compact('models', 'brands');
        return view('admin.models')->with($data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'model_name' => 'required',
            'model_brand_name' => 'required',
        ]);
   
        if($validator->fails()){
          return response()->json(['errors'=> $validator->messages()]);
        }else{
           
          $model = new CarModels();
          $model->model_name = $request['model_name'];
          $model->model_brand_name = $request['model_brand_name'];
          $model->save();
          return response()->json(['success'=> 'Model Added Successfully.']);
   
        }
    }

    public function admin_model_edit(Request $request){
      $model_id = $request->model_id;
      $model = CarModels::find($model_id);
      return response()->json([
        'model' => $model,
    ]);
 }

 public function admin_model_update($id, Request $request){
  // return response()->json([$request->all()]);
  $validator = Validator::make($request->all(), [
    'editmodel_name' => 'required',
    'editbrand_name' => 'required',
]);
 
if($validator->fails()){
  return response()->json(['errors'=> $validator->messages()]);
}else{
   
  $model = CarModels::find($id);
  $model->model_name = $request['editmodel_name'];
  $model->model_brand_name = $request['editbrand_name'];
  $model->update();
  return response()->json(['success'=> 'Models Updated Successfully']);
}
}

public function admin_model_delete($id){
  $model = CarModels::find($id);
  $model->delete();
  if($model){
     return redirect('admin/models');
  }else{
     return redirect('admin/models');
  }
  }

}
