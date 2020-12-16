<?php

namespace App\Http\Controllers;

use App\Entities\Languages;
use App\Transformers\LanguagesTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class LanguagesController extends Controller
{
    public function index()
    {
        $getData = Languages::all();
        $resource = new Collection($getData, new LanguagesTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), Languages::$criteria);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $namaLanguage = $request->input('namaLanguage');

        $data = [
            'language_name' => $namaLanguage,
        ];

        $storeMenu = Languages::create($data);

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
        $viewData = Languages::where('id', $getId)->first();

        $resource = new Item($viewData, new LanguagesTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Languages::$criteria);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $input = $request->namaLanguage;
        // dd($input);
        $updateData = Languages::find($id);
        // dd($updateData);
        $updateData->language_name = $input;
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
        $hapus = Languages::find($id);
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
