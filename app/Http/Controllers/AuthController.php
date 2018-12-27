<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;

class AuthController extends Controller
{

     public function register(Request $request)
    {
        $rules=
             [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
             ];
        $input = $request->only(
            'name',
            'email',
            'password',
            'password_confirmation'
           
        );  

        $validator = Validator::make($input, $rules); 

        if($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
       // dd($user);
        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }


    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
     
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        try {
                 if (! $user = JWTAuth::parseToken()->authenticate()) 
                {
                 return response()->json(['user_not_found'], 404);
                }
            } 
            catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                 return response()->json(['token_expired'], $e->getStatusCode());
             } 
        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password)
            ]); 
         return response([
            'status' => 'update success',
            'data' => $user
          ], 200);
            
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response(['status' => 'deleted succesfully'],200);
    }
    
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        
        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
            'status' => 'success',
            'msg' => 'You have successfully logged out.'
        ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'status' => 'error',
                'msg' => 'Failed to logout, please try again.'
            ]);
        }
    }
     public function getallusers()
     {
         $user = User::all();
         return response()->json(compact('user'));
     }
    public function getAuthenticatedUser()
            {
                    try {

                            if (! $user = JWTAuth::parseToken()->authenticate()) {
                                    return response()->json(['user_not_found'], 404);
                            }

                    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                            return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                            return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                            return response()->json(['token_absent'], $e->getStatusCode());

                    }

                    return response()->json(compact('user'));
            }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }
    public function createRole(Request $request){
         
        $role = new Role();
        $role->name = $request->input('name');
       // dd($role);
        $role->save();

        return response()->json("created");

    }
     public function createPermission(Request $request){

        $viewUsers = new Permission();
        $viewUsers->name = $request->input('name');
        $viewUsers->save();

        return response()->json("created");

    }
    public function assignRole(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();

        $role = Role::where('name', '=', $request->input('role'))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);

        return response()->json("role assigned to user");
    }
    public function attachPermission(Request $request){
        $role = Role::where('name', '=', $request->input('role'))->first();
        $permission = Permission::where('name', '=', $request->input('permission'))->first();
        $role->attachPermission($permission);

        return response()->json(" permissions attached to role");
    }
}
