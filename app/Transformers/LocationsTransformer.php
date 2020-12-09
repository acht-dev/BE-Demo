<?php

namespace App\Transformers;

use App\Entities\Locations;
use League\Fractal\TransformerAbstract;

class LocationsTransformer extends TransformerAbstract
{
    public function transform(Locations $locations)
    {
        return [
            'id' => (int) $locations->id,
            'location_name' => (string) $locations->location_name,
        ];
    }
}
