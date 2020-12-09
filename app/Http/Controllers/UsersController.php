<?php

namespace App\Http\Controllers;

use App\Entities\Users;
use App\Transformers\UsersTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = Users::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('MyApp')->accessToken;
                $response = ['token' => $token];

                return response($response, 200);
            }
            $response = ['message' => 'Password Mismatch'];

            return response($response, 422);
        }
        $response = ['message' => 'User does not exist'];

        return response($response, 422);
    }

    public function index()
    {
        // $coba = Auth::user()->token();
        // $token= $request->user()->tokens->find($coba);
        // dd($token);
        // $token->revoke();
        // dd($coba);
        // $user = Auth::user();
        $getData = Users::all();

        $resource = new Collection($getData, new UsersTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'username' => 'required|unique:users,username|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        $fullName = $request->input('fullName');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $gender = $request->input('gender');

        $dataInput = [
            'full_name' => $fullName,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'gender' => $gender,
        ];

        $storeMenu = Users::create($dataInput);

        $data['token'] = $storeMenu->createToken('MyApp')->accessToken;
        $data['name'] = $storeMenu->full_name;

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
        $viewData = Users::where('id', $getId)->first();

        $resource = new Item($viewData, new UsersTransformer());

        $fractal = app('League\Fractal\Manager');

        return response()->json($fractal->createData($resource)->toArray());
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|max:255',
            'gender' => 'required',
            'username' => 'required|unique:users,username|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 401);
        }
        // $input = $request->nama_baru;
        $fullName = $request->input('fullName');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $gender = $request->input('gender');
        // dd($input);
        $updateData = Users::find($id);
        $updateData->full_name = $fullName;
        $updateData->email = $email;
        $updateData->username = $username;
        $updateData->password = $password;
        $updateData->gender = $gender;

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
        $hapus = Users::find($id);
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

    public function logout(Request $request)
    {
        $coba = Auth::user()->token();
        $token = $request->user()->tokens->find($coba);
        $token->revoke();

        $message = 'Logout Successfully';

        return response()->json($message, 200);
    }
}
