<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Mockery\Exception;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except'=>['login']]);
    }


    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        try {
            $tokens = auth('api')->attempt($credentials);
            if(!$tokens) throw new \Exception('Unauthorized');
            $user = auth('api')->user();
            return $this->respondWithToken($tokens);
        }catch (\Exception $e) {
            return response()->json(['errors'=>$e->getMessage()], 401);
        }

    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
