<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

  public static function returnResponse(int $code = 200,$data = NULL,$msg = NULL)
  {
      if ($code == 200) {
        $msg = "OK";
      }elseif ($code == 500) {
        $msg = "System Error";
      }elseif ($code == 400) {
        $msg = "Bad Request";
      }elseif (404) {
        $msg = "Not Found";
      }

      return response()->json(["code"=>$code,"data"=>$data,"msg"=>$msg],$code);
  }

  public static function meWithRole(int $id)
  {

    $find = User::where(["id"=>$id])->first();

    $roles = ($find->roles->count() > 0);

    if (!$roles) {
      $roles = $find->roles;
    }

    $find->roles = $roles;

    return $find;

  }

}
