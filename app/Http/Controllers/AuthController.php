<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $userID = Auth::user();
            if ($userID) {

                $user = User::where('email', $request->email)->first();

                if (!$user || !Hash::check($request->password, $user->password)) {
                    throw ValidationException::withMessages([
                        'email' => ['The provided credentials are incorrect.'],
                    ]);
                }
                $data['token'] =  $user->createToken('user-token')->plainTextToken;

                return $data;
            } else {
                return response()->json([
                    "message" => "invalid credentials",
                ]);
            }
        } else {
            return response()->json([
                "message" => "invalid credentials",
            ]);
        }
    }
}
