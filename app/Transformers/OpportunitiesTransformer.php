<?php

namespace App\Transformers;

use App\Entities\Opportunities;
use League\Fractal\TransformerAbstract;

class OpportunitiesTransformer extends TransformerAbstract
{
    public function transform(Opportunities $opportunities)
    {
        return [
            'id' => (int) $opportunities->id,
            'job_name' => (string) $opportunities->job_name,
            'job_description' => (string) $opportunities->job_description,
            'time' => (int) $opportunities->time,
            'status' => (int) $opportunities->status,
            'view' => (int) $opportunities->view,
            'applying' => (int) $opportunities->applying,
        ];
    }
}
