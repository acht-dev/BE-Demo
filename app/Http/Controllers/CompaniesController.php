<?php

namespace App\Http\Controllers;

// use App\Entities\Companies;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyInterface;

// use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    protected $companyInterface;

    public function __construct(CompanyInterface $companyInterface)
    {
        $this->companyInterface = $companyInterface;
    }

    public function index()
    {
        return $this->companyInterface->getAllCompany();
        // $result = Companies::all();

        // return response()->json([
        //     'message' => 'Users Available',
        //     'code' => 200,
        //     'error' => false,
        //     'results' => $result,
        // ], 200);
    }

    public function store(CompanyRequest $request)
    {
        return $this->companyInterface->requestCompany($request);
        // $this->validate($request, [
        //     'companyName' => 'required|max:120',
        //     'address' => 'required',
        //     'phone' => 'required|unique:companies,phone',
        //     'email' => 'required|unique:companies,email',
        // ]);

        // DB::beginTransaction();

        // try {
        //     $newCompany = new Companies();
        //     $newCompany->company_name = $request->companyName;
        //     $newCompany->address = $request->address;
        //     $newCompany->phone = $request->phone;
        //     $newCompany->email = $request->email;
        //     $newCompany->save();

        //     DB::commit();

        //     return response()->json([
        //         'message' => 'User Created',
        //         'code' => 200,
        //         'error' => false,
        //         'result' => $newCompany,
        //     ], 200);
        // } catch (\Exception $e) {
        //     DB::rollBack();

        //     return response()->json([
        //         'message' => $e->getMessage(),
        //         'error' => true,
        //         'code' => 500,
        //     ], 500);
        // }
    }

    public function show($id)
    {
        return $this->companyInterface->getCompanyById($id);
        // $company = Companies::find($id);

        // if (!$company) {
        //     return response()->json(['message' => 'Company Not Found'], 404);
        // }

        // return response()->json([
        //     'message' => 'User Found',
        //     'code' => 200,
        //     'error' => false,
        //     'result' => $company,
        // ], 200);
    }

    public function update(CompanyRequest $request, $id)
    {
        return $this->companyInterface->requestCompany($request, $id);
        // $this->validate($request, [
        //     'companyName' => 'required|max:120',
        //     'address' => 'required',
        //     'phone' => 'required|unique:companies,phone',
        //     'email' => 'required|unique:companies,email',
        // ]);

        // DB::beginTransaction();

        // try {
        //     $company = Companies::find($id);
        //     if (!$company) {
        //         return response()->json(['message' => 'Company Not Found'], 404);
        //     }
        //     $company->company_name = $request->companyName;
        //     $company->address = $request->address;
        //     $company->phone = $request->phone;
        //     $company->email = $request->email;
        //     $company->save();

        //     DB::commit();

        //     return response()->json([
        //         'message' => 'User Updated',
        //         'code' => 200,
        //         'error' => false,
        //         'result' => $company,
        //     ], 200);
        // } catch (\Exception $e) {
        //     DB::rollBack();

        //     return response()->json([
        //         'message' => $e->getMessage(),
        //         'error' => true,
        //         'code' => 500,
        //     ], 500);
        // }
    }

    public function destroy($id)
    {
        return $this->companyInterface->deleteCompany($id);
        // DB::beginTransaction();

        // try {
        //     $company = Companies::find($id);
        //     if (!$company) {
        //         return response()->json(['message' => 'Company Not Found'], 404);
        //     }
        //     $company->delete();
        //     DB::commit();

        //     return response()->json([
        //         'message' => 'User Deleted',
        //         'code' => 200,
        //         'error' => false,
        //         'result' => $company,
        //     ], 200);
        // } catch (\Exception $e) {
        //     DB::rollBack();

        //     return response()->json([
        //         'message' => $e->getMessage(),
        //         'error' => true,
        //         'code' => 500,
        //     ], 500);
        // }
    }
}
