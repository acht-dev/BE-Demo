<?php

namespace App\Interfaces;

use App\Http\Requests\CompanyRequest;

interface CompanyInterface
{
    public function getAllCompany();

    public function getCompanyById($id);

    public function requestCompany(CompanyRequest $request, $id = null);

    public function deleteCompany($id);
}
