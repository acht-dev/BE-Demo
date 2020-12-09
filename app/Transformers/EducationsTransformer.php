<?php

namespace App\Transformers;

use App\Entities\Educations;
use League\Fractal\TransformerAbstract;

class EducationsTransformer extends TransformerAbstract
{
    public function transform(Educations $educations)
    {
        return [
            'id' => (int) $educations->id,
            'education_name' => (string) $educations->education_name,
        ];
    }
}
