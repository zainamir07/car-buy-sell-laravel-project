<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarFeatures;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingImages;
use App\Models\Users;
use App\Custom;
use App\Models\Colors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index(){
        $ads = Listing::where('listing_status', '1')->get()->take(20);
        $data = compact('ads');
         return view('home')->with($data);
      }
      public function services(){
          return view('services');
       }
       public function pricing(){
          return view('pricing');
       } 
  
       public function admin(){
        $listing = Listing::all()->count();
        $users = Users::all()->count();
        $activeListing = Listing::where('listing_status', '=', 1)->count();
        $activeUsers = Users::where('status', '=', 1)->count();
        $data = compact('listing', 'users', 'activeListing', 'activeUsers');
          return view('admin.dashboard')->with($data);
       }
       
       public function viewAds(Request $request){
        $location = $request['location'] ?? "";
        $search = $request['search'] ?? "";
        if($search != ""){
          $ads = Listing::where("listing_city", "LIKE", "%$search%")->get();
          // echo "search";
          // die;
        }elseif($location != ""){
          $ads = Listing::where("listing_car_model", "LIKE", "%$search%")->get();
          // echo "location";
          // die;
        }
        else{
           $ads = Listing::all();
          //  echo "Kuch bi nhi";
          // die;
        }
        $images = ListingImages::get('images_path')->first();
        $data = compact('ads', 'search', 'images');
         return view('ads')->with($data);
       }
  
       public function detailsListing($slug){
        $list = Listing::where('listing_slug', '=', $slug)->first();
        $images = ListingImages::where('images_list_id', '=', $list->listing_id)->get();
        $features = CarFeatures::where('feature_list_id', '=', $list->listing_id)->get();
        $data = compact('list', 'images', 'features');
        return view('listingDetails')->with($data);
       }
  
       public function userProfile(){
        $user_id = session()->get('user_id');
        $user = Users::find($user_id);
        $data = compact('user');
        return view('profile')->with($data);
       }
  
       public function userCarAd(){
        $cities = City::all();
        $company = Brand::all();
        $colors = Colors::all();
        // $categories = Category::all();
        $data = compact('cities', 'company', 'colors');
        return view('createAd')->with($data);
       }
  
       public function storeUserCarAd(Request $request){
  
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
           'files' => 'required',
           'description' => 'required',
           'engineType' => 'required',
           'transmission' => 'required',
           'assembly' => 'required',
           'engineCapacity' => 'required',
       ]);
         
       $carModelName = Custom::carModelName($request['model_name']);
       $carCity = Custom::carCityName($request['city']);
       $slug = Custom::slug($carModelName." ".$request['model_year']." "."for sale in"." ".$carCity." ".time());
  
       $listing = new Listing;
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
        return redirect()->route('myAds')->with('success', 'Successfully Added');
       }else{
        return redirect()->route('myAds')->with('error', 'Something Went Wrong');
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
        return redirect()->route('myAds');
      }

      
       public function editProfile(Request $request){
         $user_id = $request->user_id;
         $user = Users::find($user_id);
         return response()->json([
           'user' => $user,
       ]);
    }

    public function updateProfile($id, Request $request){
      //  return response()->json([$request->all()]);
      
      $validator = Validator::make($request->all(), [
         'user_name' => 'required',
         'user_email' => 'required|email',
     ]);
      
     if($validator->fails()){
       return response()->json(['errors'=> $validator->messages()]);
     }else{
        
       $user = Users::find($id);
       $user->name = $request['user_name'];
       $user->email = $request['user_email'];
       $user->contact = $request['user_contact'];
       $user->address = $request['user_address'];
       if($request['user_image'] != ""){
        $userImage = $request['user_image'];
        $imageName = time().".".$userImage->extension();
        $userImage->move(public_path('Backend/user_images'), $imageName);
        $user->image = $imageName; 
       }
      //  $user->image = $request['user_image'];
       $user->update();
       return response()->json(['success'=> 'Profile has been Updated Successfully']);

     }
   }  
    
   public function totalAds(){
    $user_id = session()->get('user_id');
    $listing = Listing::where('listing_car_authorId', '=', $user_id)->get();
    $totalListing = Listing::where('listing_car_authorId', '=', $user_id)->count();

    // $activeListing = Listing::where('listing_status', '=', 1)->count();
    $activeListing = $listing->where('listing_status', '=', 1)->count();
    $blockListing = $listing->where('listing_status', '=', 0)->count();
    
    $data = compact('listing', 'totalListing', 'activeListing', 'blockListing');
    return view('myAds')->with($data);
   }

   public function editCarAd($id){
    $cities = City::all();
    $company = Brand::all();
    $colors = Colors::all();
    $features = CarFeatures::where('feature_list_id', '=', $id)->first();
    $images = ListingImages::where('images_list_id', '=', $id)->get();
    $listing = Listing::find($id);
    // $categories = Category::all();
    $data = compact('cities', 'company', 'colors', 'listing', 'features', 'images');
     return view('editAd')->with($data);
   }

   public function editCarAdImage($id){
      $images = ListingImages::find($id);
      $img_path = public_path("Backend/listing_images/".$images->images_path);  
      File::delete($img_path);
      $images->delete();
      return response()->json(['success'=> 'Image has been Deleted Successfully']);
   }

   public function updateCarAd($id, Request $request){
   
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
   return redirect()->route('myAds')->with('success', 'Successfully Updated');
  }else{
   return redirect()->route('myAds')->with('error', 'Something Went Wrong');
  }

   }


   public function loginCheckForListing(Request $request){
     $user_id = session()->get('user_id');
     if($user_id > 1){
       return response()->json(['success'=> 'User Login Success']);
    }else{
       return response()->json(['errors'=> 'You must be login for publishing your ad']);
     }
   }

}
