<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required|unique:users,mobile|numeric|digits:10',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
                // 'password' => ['required', Password::defaults()],
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){

                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            // $user = Auth::user();
            // dd($user->tokens());
            // auth::user()->tokens()->delete();

            $user = User::where('email', $request->email)->first();
            // $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => 'SUCCESS',
                'status_code'   =>  '200',

                'data' => ['user'  => $user,]
            ])->withHeaders([
                'Token' => $user->createToken("API TOKEN")->plainTextToken,
            ]);

            // return response()->json([
            //     'status' => true,
            //     'message' => 'User Logged In Successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ], 200)->withHeaders([
            //     'Token' => $token->plainTextToken;

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
