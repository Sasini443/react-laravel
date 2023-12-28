<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
         
        //Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'User List',
            'data' => $users
        ],200);

    }
    public function show($id){
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ],404);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'User found',
                'data' => $user
            ],200);
        }
    }
    public function store(UserStoreRequest $request){
        try{
            // create a user
            User::create([
                'name' => $request->name,
                'email' => $request->email, 
                'password' => bcrypt($request->password)
            ]);

            // return json response
            return response()->json([
                'success' => true,
                'message' => 'User created successfully'
            ],201);
        }catch(\Exception $e){
            // return error message
            return response()->json([
                'success' => false,
                'message' => 'User creation failed!'
            ],409);

        }
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email; 
        // $user->password = bcrypt($request->password);
        // $user->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'User created successfully',
        //     'data' => $user
        // ],201);

    }
    public function update(UserStoreRequest $request, $id){
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ],404);
        }
        else{
            $user->name = $request->name;
            $user->email = $request->email; 
            $user->password = bcrypt($request->password);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ],200);
        }

    }
    public function destroy($id){
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ],404);
        }
        else{
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ],200);
        }
    }
}
