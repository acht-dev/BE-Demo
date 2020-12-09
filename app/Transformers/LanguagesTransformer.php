<?php

namespace App\Transformers;

use App\Entities\Languages;
use League\Fractal\TransformerAbstract;

class LanguagesTransformer extends TransformerAbstract
{
    public function transform(Languages $languages)
    {
        return [
            'id' => (int) $languages->id,
            'language_name' => (string) $languages->language_name,
        ];
    }
}
