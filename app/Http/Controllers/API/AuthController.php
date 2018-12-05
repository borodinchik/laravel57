<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
//    /**
//     * Create user
//     *
//     * @param  [string] name
//     * @param  [string] email
//     * @param  [string] password
//     * @param  [string] password_confirmation
//     * @return [string] message
//     */
//    public function signup(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|confirmed'
//        ]);
//        $user = new User([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password)
//        ]);
//        $user->save();
//        return response()->json([
//            'message' => 'Successfully created user!'
//        ], 201);
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) : object
    {
        $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json(
                [
                    'message' => 'Unauthorized'
                ], Response::HTTP_UNAUTHORIZED);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) : object
    {
        $request->user()->token()->revoke();
        return response()->json(
            [
                'message' => 'Successfully logged out'
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function admin(Request $request) : object
    {
        return response()->json($request->user());
    }
}
