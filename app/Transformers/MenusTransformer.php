<?php

namespace App\Transformers;

use App\Entities\Menus;
use League\Fractal\TransformerAbstract;

class MenusTransformer extends TransformerAbstract
{
    public function transform(Menus $menus)
    {
        return [
            'id' => (int) $menus->id,
            'name_menu' => (string) $menus->name_menu,
        ];
    }
}
