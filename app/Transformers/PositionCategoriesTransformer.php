<?php

namespace App\Transformers;

use App\Entities\PositionCategories;
use League\Fractal\TransformerAbstract;

class PositionCategoriesTransformer extends TransformerAbstract
{
    public function transform(PositionCategories $positionCategories)
    {
        return [
            'id' => (int) $positionCategories->id,
            'position_name' => (string) $positionCategories->position_name_category,
        ];
    }
}
