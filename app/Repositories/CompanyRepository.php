<?php

namespace App\Repositories;

use App\Entities\Companies;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyInterface;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class CompanyRepository implements CompanyInterface
{
    use ResponseAPI;

    public function getAllCompany()
    {
        try {
            $result = Companies::all();

            return $this->success('All Company', $result);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getCompanyById($id)
    {
        try {
            $company = Companies::find($id);

            if (!$company) {
                return $this->error('No User Found', 404);
            }

            return $this->success('Company Detail', $company);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestCompany(CompanyRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $company = $id ? Companies::find($id) : new Companies();

            if ($id && !$company) {
                return $this->error('No Company Found', 404);
            }

            $company->company_name = $request->company_name;
            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->email = $request->email;
            $company->save();

            DB::commit();

            return $this->success($id ? 'Company Updated' : 'Company Created', $company, 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteCompany($id)
    {
        DB::beginTransaction();

        try {
            $company = Companies::find($id);

            if (!$company) {
                return $this->error('No User Found', 404);
            }

            $company->delete();
            DB::commit();

            return $this->success('User Deleted', $company);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
