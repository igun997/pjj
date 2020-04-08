<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\RoleUser;
use App\Models\Role;

class MasterControl extends Controller
{


  public function roles_read(Request $req)
  {

    $this->validate($req,[
      "limit"=>"required|numeric|min:1",
      "page"=>"required|numeric",
      "sort"=>"required|numeric|min:0|max:1",
      "name"=>"alpha_num"
    ]);


    $data = Role::where("name","like","%".$req->name."%")->orderBy("created",($this->sort($req->sort)))->paginate($req->limit);

    return self::returnResponse(200,$data);

  }

  public function roles_update(Request $req)
  {

    $this->validate($req,[
      "id"=>"required|exists:roles,id",
      "name"=>"required|min:3|alpha_num",
      "manage_users"=>"required|numeric|boolean",
      "manage_questions"=>"required|boolean",
      "manage_theory"=>"required|boolean",
      "manage_lectures"=>"required|boolean",
      "manage_classes"=>"required|boolean",
      "is_student"=>"required|boolean",
      "is_admin"=>"required|boolean",
      "is_teacher"=>"required|boolean",
    ]);

    $true = 0;

    $required = ["is_student","is_teacher","is_admin"];

    foreach ($required as $key => $value) {

      if ($req->$value == 1) {
        $true++;
      }

    }

    if ($true != 1) {

      return self::returnResponse(401,NULL,"Choose one between student,admin and teacher");

    }

    $data = $req->all();

    unset($req["id"]);

    $find = Role::where(["id"=>$req->id]);

    $update = $find->update($data);

    if ($data) {

      return self::returnResponse(200);

    }else {

      return self::returnResponse(500);

    }


  }

  public function roles_add(Request $req)
  {

    $this->validate($req,[
      "name"=>"required|min:3|alpha_num",
      "manage_users"=>"required|numeric|boolean",
      "manage_questions"=>"required|boolean",
      "manage_theory"=>"required|boolean",
      "manage_lectures"=>"required|boolean",
      "manage_classes"=>"required|boolean",
      "is_student"=>"required|boolean",
      "is_admin"=>"required|boolean",
      "is_teacher"=>"required|boolean",
    ]);

    $true = 0;

    $required = ["is_student","is_teacher","is_admin"];

    foreach ($required as $key => $value) {

      if ($req->$value == 1) {
        $true++;
      }

    }

    if ($true != 1) {

      return self::returnResponse(401,NULL,"Choose one between student,admin and teacher");

    }


    $data = $req->all();
    $data["created"] = time();
    $save = Role::create($data);

    if ($save) {

      return self::returnResponse(200);

    }else {

      return self::returnResponse(500);

    }

  }

}