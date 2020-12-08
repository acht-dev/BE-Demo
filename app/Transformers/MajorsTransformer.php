<?php

namespace App\Transformers;

use App\Entities\Majors;
use League\Fractal\TransformerAbstract;

class MajorsTransformer extends TransformerAbstract
{
    public function transform(Majors $majors)
    {
        return [
            'id' => (int) $majors->id,
            'major_name' => (string) $majors->major_name,
        ];
    }
}
