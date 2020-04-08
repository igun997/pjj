<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;

class GuardMiddleware
{

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$level)
    {

        if (Auth::check()) {

          if (!empty($level)) {

            $whoIs = $this->meWithRole(Auth::user()->id,$level);

            if (!$whoIs) {

              return response()->json(["code"=>401,"msg"=>"Unauthorized"],401);

            }


          }else {

            return response()->json(["code"=>500,"msg"=>"Wrong Route Configuration"],500);

          }

          $response = $next($request);

          return $response;

        }else {
          return response()->json(["code"=>401,"msg"=>"Unauthorized"],401);
        }


        // Post-Middleware Action

    }

    public function meWithRole(int $id,Array $level)
    {

      $find = User::where(["id"=>$id])->first();

      $roles = ($find->roles->count() > 0);

      if ($roles) {
        foreach ($find->roles as $key => $value) {
          foreach ($level as $k => $v) {
            if ($value->$v) {
              return true;
            }
          }
        }
      }else {
        return false;
      }

      return false;


    }
}
