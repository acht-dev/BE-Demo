<?php

namespace App\Http\Controllers;

use App\Entities\ContractTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractTypesController extends Controller
{
    public function index()
    {
        $getData = ContractTypes::all();

        if ($getData) {
            $output = [
                'message' => 'success',
                'result' => $getData,
                'code' => 200,
            ];
        } else {
            $output = [
                'message' => 'Failed',
                'result' => $getData,
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ContractTypes::$criteria);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $namaKontrak = $request->input('namaKontrak');

        $data = [
            'contract_name' => $namaKontrak,
        ];

        $storeMenu = ContractTypes::create($data);

        if ($storeMenu) {
            $output = [
                'message' => 'Input Successfully',
                'result' => $data,
                'code' => 200,
            ];
        } else {
            $output = [
                'message' => 'Input Failed',
                'result' => $data,
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }

    public function show(Request $request)
    {
        $getId = $request->id;
        // dd($getId);
        $viewData = ContractTypes::where('id', $getId)->first();

        if ($viewData) {
            $output = [
                'message' => 'success',
                'result' => $viewData,
                'code' => 200,
            ];
        } else {
            $output = [
                'message' => 'Failed',
                'result' => $viewData,
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ContractTypes::$criteria);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $input = $request->nama_baru;
        // dd($input);
        $updateData = ContractTypes::find($id);
        // dd($updateData);
        $updateData->contract_name = $input;
        $updateData->save();

        if ($updateData) {
            $output = [
                'message' => 'success update data',
                'code' => 200,
            ];
        } else {
            $output = [
                'message' => 'Failed update data',
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }

    public function delete($id)
    {
        $hapus = ContractTypes::find($id);
        $hapus->delete();
        if ($hapus) {
            $output = [
                'message' => 'success delete data',
                'code' => 200,
            ];
        } else {
            $hapus = [
                'message' => 'Failed delete data',
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }
}
