<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Models\Brand;
use App\Models\CarFeatures;
use App\Models\CarModels;
use App\Models\Category;
use App\Models\City;
use App\Models\Colors;
use App\Models\Listing;
use App\Models\ListingImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ListingController extends Controller
{
    public function index(){
        $listing = Listing::all();
        $data = compact('listing');
        return view('admin.listing')->with($data);
    }

    public function create(){
        $cities = City::all();
        $colors = Colors::all();
        $company = Brand::all();
        $data = compact('cities', 'colors', 'company');
     return view('admin.createlisting')->with($data);
    }

    public function store(Request $request){
     
       $request->validate([
           'city' => 'required',
           'model_year' => 'required',
           'category' => 'required',
           'company_name' => 'required',
           'model_name' => 'required',
           'registered' => 'required',
           'exteriorColor' => 'required',
           'mileage' => 'required',
           'price' => 'required',
           'files' => 'required',
           'description' => 'required',
           'engineType' => 'required',
           'transmission' => 'required',
           'assembly' => 'required',
           'engineCapacity' => 'required',
           'contact' => 'required',
           'whatsApp' => 'required',
       ]);
    
       $carModelName = Custom::carModelName($request['model_name']);
       $carCity = Custom::carCityName($request['city']);
       $slug = Custom::slug($carModelName." ".$request['model_year']." "."for sale in"." ".$carCity." ".time());

       $listing = new Listing;
       $listing->listing_city = $request['city'];
       $listing->listing_model_year = $request['model_year'];
       $listing->listing_company_name = $request['company_name'];
       $listing->listing_car_model = $request['model_name'];
       $listing->listing_register_province = $request['registered'];
       $listing->listing_exterior_color = $request['exteriorColor'];
       $listing->listing_car_mileage = $request['mileage'];
       $listing->listing_car_price = $request['price'];
       $listing->listing_car_category = $request['category'];
       $listing->listing_car_description = $request['description'];
       $listing->listing_car_engineType = $request['engineType'];
       $listing->listing_car_engineCapacity = $request['engineCapacity'];
       $listing->listing_car_transmission = $request['transmission'];
       $listing->listing_car_assembly = $request['assembly'];
       $listing->listing_car_assembly = $request['assembly'];
       $listing->listing_car_contact = $request['contact'];
       $listing->listing_car_whatsApp = $request['whatsApp'];
       $listing->listing_car_authorId = session()->get('user_id');
       $listing->listing_slug = $slug;
       $listing->save();

       $listing_newId = $listing->listing_id;

      //Save Car Features on Database in Boolean 0 1 form
      $features = new CarFeatures;
      $features->feature_list_id = $listing_newId;
      $features->abs = $request['abs'];
      $features->airBags = $request['airBags'];
      $features->airConditioning = $request['airConditioning'];
      $features->alloyRims = $request['alloyRims'];
      $features->fmRadio = $request['fmRadio'];
      $features->cdPlayer = $request['cdPlayer'];
      $features->cassettePlayer = $request['cassettePlayer'];
      $features->coolBox = $request['coolBox'];
      $features->cruiseControl = $request['cruiseControl'];
      $features->climateControl = $request['climateControl'];
      $features->dvdPlayer = $request['dvdPlayer'];
      $features->frontSpeakers = $request['frontSpeakers'];
      $features->frontCamera = $request['frontCamera'];
      $features->heatedSeats = $request['heatedSeats'];
      $features->immobilizerKey = $request['immobilizerKey'];
      $features->keylessEntry = $request['keylessEntry'];
      $features->navigationSystem = $request['navigationSystem'];
      $features->powerLocks = $request['powerLocks'];
      $features->powerMirrors = $request['powerMirrors'];
      $features->powerSteering = $request['powerSteering'];
      $features->powerWindows = $request['powerWindows'];
      $features->rearSeatEntertainment = $request['rearSeatEntertainment'];
      $features->rearAcVents = $request['rearAcVents'];
      $features->rearSpeakers = $request['rearSpeakers'];
      $features->rearCamera = $request['rearCamera'];
      $features->sunRoof = $request['sunRoof'];
      $features->steeringSwitches = $request['steeringSwitches'];
      $features->USBCable = $request['usbCable'];
      $features->save();

       //Image Uploading to the Other Table
       if($request['files'] != ""){
        $i = 1;
        foreach ($request->file('files') as $uploadImages) {
          $listing_images = new ListingImages;
          $imageName = $listing_newId.'_'.$i.'_'.".".$uploadImages->extension();
          $uploadImages->move(public_path('Backend/listing_images'), $imageName);
          $listing_images->images_path = $imageName; 
          $listing_images->images_list_id = $listing_newId;
          $listing_images->save(); 
          $i++;
        }        
       }
       if($listing){
        return redirect()->route('admin.listing')->with('success', 'Successfully Added');
       }else{
        return redirect()->route('admin.listing')->with('error', 'Something Went Wrong');
       }
    }

    public function delete($id){
      $listing = Listing::find($id);
      $features = CarFeatures::where('feature_list_id', '=', $id);
      $images = ListingImages::where('images_list_id', '=', $id)->get();

      foreach ($images as $img) {
        $img_path = public_path("Backend/listing_images/".$img->images_path);  
        File::delete($img_path);
        $img->delete();
        }

      $listing->delete();
      $features->delete();
      return redirect()->route('admin.listing');
    }


    public function status_check(Request $request){
      $list_id = $request->id;
      $list = Listing::find($list_id);
      // return response()->json([$car]);
      if($list != ""){
        $list->listing_status = $request->status;
        $list->update();
         return response()->json(['success'=> 'Update Successfully']);
        }else{
         return response()->json(['errors'=> 'Something Went Wrong']);
        }
    }

    public function getModelsName(Request $request){
        // return response()->json([$request->all()]);
        $company_id = $request['id'];
        $model = CarModels::where('model_brand_name', '=', $company_id)->get();
        return response()->json([
          'model' => $model,
        ]);
    }

    public function edit($id){
      $cities = City::all();
      $company = Brand::all();
      $colors = Colors::all();
      $features = CarFeatures::where('feature_list_id', '=', $id)->first();
      $images = ListingImages::where('images_list_id', '=', $id)->get();
      $listing = Listing::find($id);
      // $categories = Category::all();
      $data = compact('cities', 'company', 'colors', 'listing', 'features', 'images');
       return view('admin.editAd')->with($data);
    }

    public function update($id, Request $request){
   
      $request->validate([
        'category' => 'required',
        'city' => 'required',
        'model_year' => 'required',
        'company_name' => 'required',
        'model_name' => 'required',
        'registered' => 'required',
        'exteriorColor' => 'required',
        'mileage' => 'required',
        'price' => 'required',
        // 'files' => 'required',
        'description' => 'required',
        'engineType' => 'required',
        'transmission' => 'required',
        'assembly' => 'required',
        'engineCapacity' => 'required',
    ]);
    // echo '<pre>';
    // print_r($request->all());
    // die;
    $carModelName = Custom::carModelName($request['model_name']);
    $carCity = Custom::carCityName($request['city']);
    $slug = Custom::slug($carModelName." ".$request['model_year']." "."for sale in"." ".$carCity." ".time());
  
    $listing = Listing::find($id);
    $listing->listing_car_category = $request['category'];
    $listing->listing_city = $request['city'];
    $listing->listing_model_year = $request['model_year'];
    $listing->listing_company_name = $request['company_name'];
    $listing->listing_car_model = $request['model_name'];
    $listing->listing_register_province = $request['registered'];
    $listing->listing_exterior_color = $request['exteriorColor'];
    $listing->listing_car_mileage = $request['mileage'];
    $listing->listing_car_price = $request['price'];
    $listing->listing_car_description = $request['description'];
    $listing->listing_car_engineType = $request['engineType'];
    $listing->listing_car_engineCapacity = $request['engineCapacity'];
    $listing->listing_car_transmission = $request['transmission'];
    $listing->listing_car_assembly = $request['assembly'];
    $listing->listing_car_contact = $request['contact'];
    $listing->listing_car_whatsApp = $request['whatsApp'];
    
    $listing->listing_slug = $slug;
    $listing->update();
   
  
    // $listing_newId = $listing->listing_id;
  
   //Save Car Features on Database in Boolean 0 1 form
   $features = CarFeatures::where('feature_list_id', '=', $id)->first();
   $features->abs = $request['abs'];
   $features->airBags = $request['airBag'];
   $features->airConditioning = $request['airConditioning'];
   $features->alloyRims = $request['alloyRims'];
   $features->fmRadio = $request['fmRadio'];
   $features->cdPlayer = $request['cdPlayer'];
   $features->cassettePlayer = $request['cassettePlayer'];
   $features->coolBox = $request['coolBox'];
   $features->cruiseControl = $request['cruiseControl'];
   $features->climateControl = $request['climateControl'];
   $features->dvdPlayer = $request['dvdPlayer'];
   $features->frontSpeakers = $request['frontSpeakers'];
   $features->frontCamera = $request['frontCamera'];
   $features->heatedSeats = $request['heatedSeats'];
   $features->immobilizerKey = $request['immobilizerKey'];
   $features->keylessEntry = $request['keylessEntry'];
   $features->navigationSystem = $request['navigationSystem'];
   $features->powerLocks = $request['powerLocks'];
   $features->powerMirrors = $request['powerMirrors'];
   $features->powerSteering = $request['powerSteering'];
   $features->powerWindows = $request['powerWindows'];
   $features->rearSeatEntertainment = $request['rearSeatEntertainment'];
   $features->rearAcVents = $request['rearAcVents'];
   $features->rearSpeakers = $request['rearSpeakers'];
   $features->rearCamera = $request['rearCamera'];
   $features->sunRoof = $request['sunRoof'];
   $features->steeringSwitches = $request['steeringSwitches'];
   $features->USBCable = $request['usbCable'];
   $features->update();
  //  if($features != ""){
  //  }
  // echo '<pre>';
  // print_r($features->toArray());
  // die;
  
    //Image Uploading to the Other Table
    if($request['files'] != ""){
     $i = 1;
     foreach ($request->file('files') as $uploadImages) {
       $listing_images = new ListingImages;
       $imageName = $id.'_'.$i.'_'.".".time().".".$uploadImages->extension();
       $uploadImages->move(public_path('Backend/listing_images'), $imageName);
       $listing_images->images_path = $imageName; 
       $listing_images->images_list_id = $id;
       $listing_images->save(); 
       $i++;
     }        
    }
    if($listing){
     return redirect()->route('admin.listing')->with('success', 'Successfully Updated');
    }else{
     return redirect()->route('admin.listing')->with('error', 'Something Went Wrong');
    }
  
     }
  
}
