<?php

namespace App\Http\Controllers;

use App\Entities\Majors;
use App\Transformers\MajorsTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

// use League\Fractal\Manager;

class MajorsController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        $resource = new Collection($majors, new MajorsTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), Majors::$criteria);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $namaMajor = $request->input('namaMajor');

        $data = [
            'major_name' => $namaMajor,
        ];

        $storeMenu = Majors::create($data);

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
        $viewData = Majors::where('id', $getId)->first();

        $resource = new Item($viewData, new MajorsTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function edit(Request $request, $id)
    {
        $input = $request->namaBaru;
        // dd($input);
        $updateData = Majors::find($id);
        // dd($updateData);
        $updateData->major_name = $input;
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
        $hapus = Majors::find($id);
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
