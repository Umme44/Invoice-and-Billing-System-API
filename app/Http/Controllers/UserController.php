<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //REGISTER

   public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'role'     => 'in:admin,accountant,user'
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => $request->role ?? 'user',
    ]);

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'user'  => $user,
        'token'=> $token
    ], 201);
}

//LOGIN



    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

   

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;
  

    return response()->json([
        'user'  => $user,
        'token'=> $token
    ]);
}
//LOGOUT
     public function logout(){
        return 'logout';

    }


    public function index(){
        return User::all();
    }

    public function update(Request $request, string $id){

        $user = User::find($id);
        if(!$user ){
            return response()->json([
                'message'=>"User Not found"
            ], 404);

        }
        $user->update($request->all());
        return response()->json([
            'message'=>"User Update Successfully",
            'data'=>$user
        ]);


       

    }

    public function destroy(string $id){
           $user = User::find($id);
        if (! $user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $user->delete();

    return response()->json([
        'message' => 'User deleted successfully'
    ]);

    }
}
