<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {

            $response = [
                'success' => false,
                'message' => 'These credentials do not match our records.',
            ];
            return response()->json($response, 401);
        }

        $token = $user->createToken('my-token')->plainTextToken;

        $response = [
            'success' => true,
            'message' => 'Login successfully.',
            'data' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    private function validateLogin(Request $request) 
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    }
}
