<?php

namespace App\Transformers;

use App\Entities\ContractTypes;
use League\Fractal\TransformerAbstract;

class ContractTypesTransformer extends TransformerAbstract
{
    public function transform(ContractTypes $contractTypes)
    {
        return [
            'id' => (int) $contractTypes->id,
            'contract_name' => (string) $contractTypes->contract_name,
        ];
    }
}
