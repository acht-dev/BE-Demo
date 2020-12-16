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
            'categorizes_id' => (int) $opportunities->categorizes_id,
            'position_category_id' => (int) $opportunities->position_category_id,
            'education_id' => (int) $opportunities->education_id,
            'other_skills' => (string) $opportunities->other_skills,
            'years_experience' => (int) $opportunities->years_experience,
            'contract_type_id' => (int) $opportunities->contract_type_id,
            'major_id' => (int) $opportunities->major_id,
            'location_id' => (int) $opportunities->location_id,
            'language_id' => (int) $opportunities->language_id,
            'remote' => (int) $opportunities->remote,
        ];
    }
}
