<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
        ]);

        //create user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return response()->Json([
            'user' => $user,
            'success' => true,
        ], 201);
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'email | required',
            'password' => 'required',
        ]);

        $login_detail = request(['email' , 'password']);

        if(!Auth::attempt($login_detail)){
            return response()->json([
                'success' => false
            ], 401);

        }

        $user = $request->user();

        $tokenResult =$user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'success' => true,
            'access_token' => $tokenResult->accessToken,
            'token_id' => $token->id,
            'user_id' =>$user->id,
            'name' => $user->name,
            'email' => $user->email,
            'type' => $user->type
        ], 200);
    }
}
