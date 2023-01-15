<?php 

namespace App;

use App\Models\Brand;
use App\Models\CarModels;
use App\Models\Users;
use App\Models\Colors;
use App\Models\Cities;
use App\Models\City;
use App\Models\Listing;
use App\Models\ListingImages;

class Custom{
    
    public static function cityName($city_id){
        $cities = City::find($city_id);
        return $cities->city;
     }

     public static function colorName($color_id){
        $color = Colors::find($color_id);
        return $color->color_name;
     }

     public static function totalCategoryListings($category_id){
        $listing = Listing::where('listing_car_category', '=', $category_id)->count();
        return $listing;
     }

     public static function brandName($brand_id){
      $brand = Brand::where('brand_id', '=', $brand_id)->get();
      return $brand->brand_name;
   }

   public static function allYears(){
      $years = range(date('Y'), 1940);
      return $years;
   }

   public static function carCompanyName($id){
      $company = Brand::find($id);
      return $company->brand_name;
   }

   public static function carModelName($id){
      $model = CarModels::find($id);
      return $model->model_name;
   }

   public static function listingImagePath($id){
      $image = ListingImages::where('images_list_id', '=', $id)->first();
      $image_path = $image->images_path;
      return 'Backend/listing_images/'.$image_path;
   }

   public static function carCityName($id){
      $city = City::where('id', '=', $id)->first();
      return $city->city;
   }

   public static function slug($text, string $divider = '-')
   {
     // replace non letter or digits by divider
     $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
   
     // transliterate
     $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
   
     // remove unwanted characters
     $text = preg_replace('~[^-\w]+~', '', $text);
   
     // trim
     $text = trim($text, $divider);
   
     // remove duplicate divider
     $text = preg_replace('~-+~', $divider, $text);
   
     // lowercase
     $text = strtolower($text);
   
     if (empty($text)) {
       return 'n-a';
     }
   
     return $text;
   }

   public static function oldPassword($password){
      $user_id = session()->get('user_id');
      $user = Users::find($user_id);
      $oldPassword = $user->password;
      if(md5($password) == $oldPassword){
         return true;
      }else{
         return "Password Does Not Match";
      }
  }

    }




?>