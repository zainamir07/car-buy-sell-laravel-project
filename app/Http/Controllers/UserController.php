<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = Users::all();
        $data = compact('users');
        return view('admin.users')->with($data);
    }

    public function status_check(Request $request){
        $user = $request->user_id;
        $user = Users::find($user);
        
        if($user != ""){
          $user->status = $request->status;
          $user->update();
           return response()->json(['user'=> $user]);
          }else{
           return response()->json(['errors'=> 'Something Went Wrong']);
          }
      }
 
     
      public function admin_user_register(Request $request){
       //   return response()->json([$request]);
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
        $user->contact = $request['contact'];
        $user->address = $request['address'];
        $user->password = md5($request['password']);
        $user->save();
        return response()->json(['success'=> 'You have been Register Successfully. Login now']);
 
      }
      }
 
 
      public function admin_user_edit(Request $request){
           $user_id = $request->user_id;
           $user = Users::find($user_id);
           return response()->json([
             'user' => $user,
         ]);
      }
 
    public function admin_user_update($id, Request $request){
       $validator = Validator::make($request->all(), [
          'editname' => 'required',
          'editemail' => 'required|email',
      ]);
       
      if($validator->fails()){
        return response()->json(['errors'=> $validator->messages()]);
      }else{
         
        $user = Users::find($id);
        $user->name = $request['editname'];
        $user->email = $request['editemail'];
        $user->contact = $request['editcontact'];
        $user->address = $request['editaddress'];
        $user->update();
        return response()->json(['success'=> 'You have been Updated Successfully']);
 
      }
    }  
 
    public function admin_user_delete($id){
    $user = Users::find($id);
    $user->delete();
    if($user){
       return redirect('admin/users');
    }else{
       return redirect('admin/users');
    }
    }



    
}
