<?php

namespace App\Http\Controllers\API;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function signup(Request $request) : JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_admin' => 0,
            ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse
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
     * @return JsonResponse
     */
    public function logout(Request $request) : JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json(
            [
                'message' => 'Successfully logged out'
            ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function admin(Request $request) : JsonResponse
    {
        return response()->json($request->user());
    }
}
