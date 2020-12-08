<?php

namespace App\Http\Controllers;

use App\Entities\PositionCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionCategoriesController extends Controller{

  public function index(){
    $getData = PositionCategories::all();

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

    $validator = Validator::make($request->all(), PositionCategories::$criteria);
    
    if($validator->fails()){
      return response()->json([
        'message' => $validator->errors()
      ], 401);
    }else{
      $namaPosisiKategori = $request->input('namaPosisiKategori');

      $data = [
        'position_name_category' => $namaPosisiKategori
      ];

      $storeMenu = PositionCategories::create($data);

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

  public function show(Request $request){

    $getId = $request->id;
    // dd($getId);
    $viewData = PositionCategories::where('id', $getId)->first();

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

  public function edit(Request $request, $id){
    
    $validator = Validator::make($request->all(), PositionCategories::$criteria);
    
    if($validator->fails()){
      return response()->json([
        'message' => $validator->errors()
      ], 401);
    }else{
      $input = $request->nama_baru;
      // dd($input);
      $updateData = PositionCategories::find($id);
      // dd($updateData);
      $updateData->position_name_category = $input;
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
    
    $hapus = PositionCategories::find($id);
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