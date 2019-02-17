<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConfigsController extends Controller
{
    public function index(){
      $checkMode = DB::table("configurations")->where("name", "maintenance")->first();
      if ($checkMode->value == "on"){
        return view("configurations.settings", [
          "maintenanceActive" => true
        ]);
      } else {
        return view('configurations.settings', [
          "maintenanceActive" => false
        ]);
      }

    }

    public function maintenance(){
      return view("configurations.maintenance");
    }

    public function toggle(Request $request){
      if ($request->maintenance == "on"){
        DB::table("configurations")
          ->where("name", "maintenance")
          ->update(["value"=>"on"]);
      } else {
        DB::table("configurations")
          ->where("name", "maintenance")
          ->update(["value"=>"off"]);
      }

      return redirect("/");
    }
}
