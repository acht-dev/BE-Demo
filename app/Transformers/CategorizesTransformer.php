<?php

namespace App\Transformers;

use App\Entities\Categorizes;
use League\Fractal\TransformerAbstract;

class CategorizesTransformer extends TransformerAbstract
{
    public function transform(Categorizes $categorizes)
    {
        return [
            'id' => (int) $categorizes->id,
            'categorize_name' => (string) $categorizes->categorize_name,
        ];
    }
}
