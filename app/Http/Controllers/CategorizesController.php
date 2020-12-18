<?php

namespace App\Http\Controllers;

use App\Entities\Categorizes;
use App\Transformers\CategorizesTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class CategorizesController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermissionTo('categorizes-list')) {
            $getData = Categorizes::all();

            $resource = new Collection($getData, new CategorizesTransformer());
            $fractal = app('League\Fractal\Manager');

            return response()->json($fractal->createData($resource)->toArray());
        }

        return response()->json(['message' => 'unauthorize'], 403);
    }

    public function create(Request $request)
    {
        // dd(Auth::user());
        if (Auth::user()->hasPermissionTo('categorizes-create')) {
            $validator = Validator::make($request->all(), Categorizes::$criteria);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                ], 401);
            }
            $namaKategori = $request->input('namaKategori');

            $data = [
                'categorize_name' => $namaKategori,
            ];

            $storeMenu = Categorizes::create($data);

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

        return response()->json(['message' => 'unauthorize'], 403);
    }

    public function show(Request $request)
    {
        if (Auth::user()->hasPermissionTo('categorizes-view')) {
            $getId = $request->id;
            // dd($getId);
            $viewData = Categorizes::where('id', $getId)->first();

            $resource = new Item($viewData, new CategorizesTransformer());
            $fractal = app('League\Fractal\Manager');

            return response()->json($fractal->createData($resource)->toArray());
        }

        return response()->json(['message' => 'unauthorize'], 403);
    }

    public function edit(Request $request, $id)
    {
        if (Auth::user()->hasPermissionTo('categorizes-edit')) {
            $validator = Validator::make($request->all(), Categorizes::$criteria);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                ], 401);
            }
            $input = $request->namaKategori;
            // dd($input);
            $updateData = Categorizes::find($id);
            // dd($updateData);
            $updateData->categorize_name = $input;
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

        return response()->json(['message' => 'unauthorize'], 403);
    }

    public function delete($id)
    {
        if (Auth::user()->hasPermissionTo('categorizes-delete')) {
            $hapus = Categorizes::find($id);
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

        return response()->json(['message' => 'unauthorize'], 403);
    }
}
