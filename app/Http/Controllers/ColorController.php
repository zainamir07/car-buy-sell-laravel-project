<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index(){
        $colors = Colors::orderBy('color_id', 'desc')->paginate(5);
        $data = compact('colors');
        return view('admin.colors')->with($data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'color_name' => 'required',
        ]);
   
        if($validator->fails()){
          return response()->json(['errors'=> $validator->messages()]);
        }else{
           
          $color = new Colors;
          $color->color_name = $request['color_name'];
          $color->save();
          return response()->json(['success'=> 'Added Successfully']);
   
        }
    }

    public function admin_color_edit(Request $request){
        // return response()->json([$request->all()]);
        $id = $request['color_id'];
        $color = Colors::find($id);
        return response()->json([
          'color' => $color,
      ]);
 }

 public function admin_color_update($id, Request $request){
  // return response()->json([$request->all()]);
  $validator = Validator::make($request->all(), [
    'editcolor_name' => 'required',
]);
 
if($validator->fails()){
  return response()->json(['errors'=> $validator->messages()]);
}else{
   
  $color = Colors::find($id);
  $color->color_name = $request['editcolor_name'];
  $color->update();
  return response()->json(['success'=> 'Color Updated Successfully']);
}
}

public function admin_color_delete($id){
  $color = Colors::find($id);
  $color->delete();
  if($color){
     return redirect('admin/colors');
  }else{
     return redirect('admin/colors');
  }
  }
  
}
