<?php

namespace App\Http\Controllers;

use App\Entities\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenusController extends Controller{

  public function index(){
    $getData = Menus::all();

    if($getData){
      $output = [
        "message" => "success",
        "result" => $getData,
        "code" => 200,
      ];
    }else{
      $output = [
        "message" => "Failed",
        "result" => $getData,
        "code" => 404,
      ];
    }

    return response()->json($output, $output['code']);    
  }

  public function create(Request $request){
    
    $validator = Validator::make($request->all(), Menus::$criteria);

    if($validator->fails()){
      return response()->json([
        'message' => $validator->errors()
      ], 401);
    }else{
      $namaMenu = $request->input('namaMenu');

      $data = [
        'name_menu' => $namaMenu
      ];

      $storeMenu = Menus::create($data);

      if($storeMenu){
        $output = [
          "message" => "Input Successfully",
          "result" => $data,
          "code" => 200,
        ];
      }else{
        $output = [
          "message" => "Input Failed",
          "result" => $data,
          "code" => 404,
        ];
      }

      return response()->json($output, $output['code']);
    }
    
  }

  public function view(Request $request){

    $getId = $request->id;
    // dd($getId);
    $viewData = Menus::where('id', $getId)->first();

    if($viewData){
      $output = [
        "message" => "success",
        "result" => $viewData,
        "code" => 200,
      ];
    }else{
      $output = [
        "message" => "Failed",
        "result" => $viewData,
        "code" => 404,
      ];
    }

    return response()->json($output, $output['code']);
  }

  public function update(Request $request, $id){
    
    $validator = Validator::make($request->all(), Menus::$criteria);
    if($validator->fails()){
      return response()->json([
        'message' => $validator->errors()
      ], 401);
    }else{
      $input = $request->nama_baru;
      // dd($input);
      $updateData = Menus::find($id);
      // dd($updateData);
      $updateData->name_menu = $input;
      $updateData->save();

      if($updateData){
        $output = [
          "message" => "success update data",
          "code" => 200,
        ];
      }else{
        $output = [
          "message" => "Failed update data",
          "code" => 404,
        ];
      }
      return response()->json($output, $output['code']);
    }
  }

  public function delete($id){
    
    $hapus = Menus::find($id);
    $hapus->delete();
    if($hapus){
      $output = [
        "message" => "success delete data",
        "code" => 200,
      ];
    }else{
      $hapus = [
        "message" => "Failed delete data",
        "code" => 404,
      ];
    }
    return response()->json($output, $output['code']);
  }
}