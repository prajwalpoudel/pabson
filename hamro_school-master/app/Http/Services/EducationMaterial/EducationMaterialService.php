<?php


namespace App\Http\Services\EducationMaterial;


use App\Entities\EducationMaterial;
use App\Services\General\BaseService;

class EducationMaterialService extends BaseService
{
    public function model()
    {
        return EducationMaterial::class;
    }
}
