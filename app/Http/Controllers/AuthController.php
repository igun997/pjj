<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
  /**
       * Create a new AuthController instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth:api', ['except' => ['login','register']]);
      }

      /**
       * Get a JWT via given credentials.
       *
       * @return \Illuminate\Http\JsonResponse
       */
      public function login(Request $req)
      {
          $credentials = $req->all();


          if (! $token = Auth::attempt($credentials)) {
              return response()->json(['error' => 'Unauthorized'], 401);
          }

          return $this->respondWithToken($token);
      }

      public function register(Request $req)
      {

        $this->validate($req,[
          "name"=>"required",
          "username"=>"required",
          "password"=>"required",
        ]);

        $data = $req->all();
        $data["password"] = Hash::make($data["password"]);
        $data["created"] = time();

        $save = User::create($data);

        if ($save) {

          return self::returnResponse(200);

        }else {

          return self::returnResponse(400);

        }


      }

      /**
       * Get the authenticated User.
       *
       * @return \Illuminate\Http\JsonResponse
       */
      public function me()
      {

          $data = self::meWithRole(Auth::user()->id);

          return response()->json($data);
      }

      /**
       * Log the user out (Invalidate the token).
       *
       * @return \Illuminate\Http\JsonResponse
       */
      public function logout()
      {
          Auth::logout();

          return response()->json(['message' => 'Successfully logged out']);
      }

      /**
       * Refresh a token.
       *
       * @return \Illuminate\Http\JsonResponse
       */
      public function refresh()
      {
          return $this->respondWithToken(Auth::refresh());
      }

      /**
       * Get the token array structure.
       *
       * @param  string $token
       *
       * @return \Illuminate\Http\JsonResponse
       */
      protected function respondWithToken($token)
      {
          return response()->json([
              'access_token' => $token,
              'token_type' => 'bearer',
              'expires_in' => Auth::factory()->getTTL() * 60
          ]);
      }
}
