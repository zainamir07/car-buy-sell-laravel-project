<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index(){
        $cities = City::orderBy('id', 'desc')->paginate(5);
        $data = compact('cities');
        return view('admin.cities')->with($data);
    }

    public function store(Request $request){
        // return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'city_name' => 'required',
        ]);
   
        if($validator->fails()){
          return response()->json(['errors'=> $validator->messages()]);
        }else{
           
          $city = new City;
          $city->city = $request['city_name'];
          $city->save();
          return response()->json(['success'=> 'Added Successfully.']);
   
        }

    }

    public function delete($id){
        $city = City::find($id);
        $city->delete();
        return redirect()->back();
      }

    public function edit(Request $request){
        $city_id = $request->city_id;
        $city = City::find($city_id);
        return response()->json([
          'city' => $city,
      ]);
    }

    public function update($id, Request $request){
        // return response()->json([$request->all()]);
        $validator = Validator::make($request->all(), [
          'editcity_name' => 'required',
      ]);
      if($validator->fails()){
        return response()->json(['errors'=> $validator->messages()]);
      }else{
         
        $city = City::find($id);
        $city->city = $request['editcity_name'];
        $city->update();
        return response()->json(['success'=> 'City Updated Successfully']);
      }
    }
}
