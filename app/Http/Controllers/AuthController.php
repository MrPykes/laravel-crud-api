<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
// use App\Services\ResponseHandler\ResponseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        // dd($request->_token);
        if (Auth::attempt($credentials)) {
            $userID = Auth::user();
            // $user = User::find($userID);
            // $token = $user->createToken('user-token')->plainTextToken;
            // dd($token);
            if ($userID) {

                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                $user = User::where('email', $request->email)->first();

                if (!$user || !Hash::check($request->password, $user->password)) {
                    throw ValidationException::withMessages([
                        'email' => ['The provided credentials are incorrect.'],
                    ]);
                }

                $token =  $user->createToken('user-token')->plainTextToken;
                dd($token);
                // $user->createToken('Token Name')->accessToken;
                // if ($userResource->withSession === null) {

                //     // Create user token to be used for future requests.
                //     $data['token'] = $this->createToken('user-token')->plainTextToken;
                //     dd($data['token']);
                // }
                // return ResponseService::success($userResource, __('success.auth.login'));
            } else {
                return response()->json([
                    "message" => "invalid credentials",
                ]);
            }
        } else {
            return response()->json([
                "message" => "invalid credentials12313",
            ]);
        }
    }
}
