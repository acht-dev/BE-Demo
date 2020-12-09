<?php

namespace App\Transformers;

use App\Entities\Users;
use League\Fractal\TransformerAbstract;

class UsersTransformer extends TransformerAbstract
{
    public function transform(Users $users)
    {
        return [
            'id' => (int) $users->id,
            'full_name' => (string) $users->full_name,
            'email' => (string) $users->email,
            'gender' => (string) $users->gender,
        ];
    }
}
