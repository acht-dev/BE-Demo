<?php

namespace App\Http\Controllers;

use App\Entities\Opportunities;
use App\Transformers\OpportunitiesTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class OpportunitiesController extends Controller
{
    public function index()
    {
        $allData = Opportunities::all();
        $resource = new Collection($allData, new OpportunitiesTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function show($id)
    {
        $getData = Opportunities::find($id);
        $resource = new Item($getData, new OpportunitiesTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobName' => 'required|max:255',
            // 'time' => 'required|numeric',
            'status' => 'numeric',
            'categorizesId' => 'required|numeric',
            'views' => 'numeric',
            'applying' => 'numeric',
            'desc' => 'required',
            'posCatId' => 'required',
            // 'dateOpen' => 'required|date',
            // 'dateClose' => 'required|date',
            // 'eduId' => 'required',
            // 'userId' => 'required',
            'yearsExp' => 'required',
            'contract' => 'required',
            'majorId' => 'required',
            'locationId' => 'required',
            'langId' => 'required',
            'remote' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $storeData = Opportunities::create([
            'job_name' => $request->input('jobName'),
            'time' => $request->input('time'),
            'categorizes_id' => $request->input('categorizesId'),
            'status' => $request->input('status'),
            'view' => $request->input('views'),
            'applying' => $request->input('applying'),
            'job_description' => $request->input('desc'),
            'position_category_id' => $request->input('posCatId'),
            'date_open' => $request->input('dateOpen'),
            'date_close' => $request->input('dateClose'),
            'education_id' => $request->input('eduId'),
            'user_id' => $request->input('userId'),
            'other_skills' => $request->input('other'),
            'years_experience' => $request->input('yearsExp'),
            'contract_type_id' => $request->input('contract'),
            'major_id' => $request->input('majorId'),
            'location_id' => $request->input('locationId'),
            'language_id' => $request->input('langId'),
            'remote' => $request->input('remote'),
        ]);

        if ($storeData) {
            $output = [
                'message' => 'Input Successfully',
                'code' => 200,
            ];
        } else {
            $output = [
                'message' => 'Input Failed',
                'code' => 404,
            ];
        }

        return response()->json($output, $output['code']);
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jobName' => 'required|max:255',
            // 'time' => 'required|numeric',
            'status' => 'numeric',
            'categorizesId' => 'required|numeric',
            'views' => 'numeric',
            'applying' => 'numeric',
            'desc' => 'required',
            'posCatId' => 'required',
            // 'dateOpen' => 'required|date',
            // 'dateClose' => 'required|date',
            // 'eduId' => 'required',
            // 'userId' => 'required',
            'yearsExp' => 'required',
            'contract' => 'required',
            'majorId' => 'required',
            'locationId' => 'required',
            'langId' => 'required',
            'remote' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $getData = Opportunities::find($id);

        $getData->job_name = $request->input('jobName');
        // $getData->time = $request->input('time');
        // $getData->status = $request->input('status');
        // $getData->applying = $request->input('applying');
        // $getData->view = $request->input('views');
        $getData->job_description = $request->input('desc');
        $getData->position_category_id = $request->input('posCatId');
        // $getData->date_open = $request->input('dateOpen');
        // $getData->date_close = $request->input('dateClose');
        $getData->education_id = $request->input('eduId');
        // $getData->user_id = $request->input('userId');
        $getData->other_skills = $request->input('other');
        $getData->years_experience = $request->input('yearsExp');
        $getData->contract_type_id = $request->input('contract');
        $getData->major_id = $request->input('majorId');
        $getData->location_id = $request->input('locationId');
        $getData->language_id = $request->input('langId');
        $getData->remote = $request->input('remote');

        $getData->save();

        if ($getData) {
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
        $hapus = Opportunities::find($id);
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
