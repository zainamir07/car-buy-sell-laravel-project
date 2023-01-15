<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
 
class AuthController extends Controller
{
    public function register_check(Request $request){
        //    return $request->post(); 
        $validator = Validator::make($request->all(), [
                      'name' => 'required',
                      'email' => 'required|email',
                      'password' => 'required| confirmed',
                      'password_confirmation' => 'required',
                  ]);
    
                  if($validator->fails()){
                    return response()->json(['errors'=> $validator->messages()]);
                  }else{
                     
                    $user = new Users;
                    $user->name = $request['name'];
                    $user->email = $request['email'];
                    $user->password = md5($request['password']);
                    $user->save();
                    return response()->json(['success'=> 'You have been Register Successfully. Login now']);
    
                  }
        }

        public function login_check(Request $request){
          //  return $request->all(); 
        $validator = Validator::make($request->all(), [
                      'email' => 'required|email',
                      'password' => 'required',
                  ]);
    
                  if($validator->fails()){
                    return response()->json(['errors'=> $validator->messages()]);
                  }
                  // else{ 
                      $user = Users::where('email', '=', $request['email'])->first();
                      // $user = User::where([
                      //     ['email', '=', $request['email']],
                      //     // ['status', '=', 1]
                      //   ])->first();

                      $password = md5($request['password']);
                      if($user->password == $password){
                        // return response()->json(['errors'=> $password]);
                        // if($user->status == 1){
                          // return response()->json(['errors'=> 'Working']);
                          session()->put('user_id', $user->id);
                          session()->put('user_name', $user->name);
                          session()->put('user_email', $user->email);
                          return response()->json(['success']);
                        // }
                    }else{
                      return response()->json(['errors'=> 'Password is incorrect']);
                    }
    
                  // }
        }

        public function changePassword(Request $request){
       $user_id = session()->get('user_id');

          $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
          return response()->json(['errors'=> $validator->messages()]);
        }else{
          

          $oldPassword = Custom::oldPassword($request['oldPassword']);
          $password = $request['password'];
          if($oldPassword == 1){
            $user = User::find($user_id);
            $user->password = md5($password);
            $user->update();
            // return redirect('logout')->with(['success' => 'Password Updated Successfully. Login with new password']);
              return response()->json(['success'=> 'Password Updated Successfully. Login with new password']);

            }else{
              return response()->json(['errors'=> 'Old Password Not Correct']);
            }

        }
       

        }

        public function logout(){
            session()->forget('user_id');
            session()->forget('user_name');
            session()->forget('user_email');
            return redirect()->route('home');
        }

}
