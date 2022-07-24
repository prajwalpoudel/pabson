<?php

use App\Constants\RoleConstant;
use Illuminate\Http\RedirectResponse;


/**
 * Get Front user
 *
 * @param string $guard
 * @return mixed
 */
function me($guard = null)
{
    return Auth::guard($guard)->user();
}

/**
 * Get logged in front user
 *
 *  *
 * @param null $attribute
 * @return mixed
 */
function frontUser($attribute = null)
{
    if ($attribute) {
        return me('front')->{$attribute};
    }
    return me('front');
}

/**
 * admin User
 *
 * @return mixed
 */
function adminUser()
{
    return me('admin');
}

function checkIfAuthenticated()
{
    if (Auth::check()) {
        return true;
    } else {
        return false;
    }
}

function getSchoolSidebarAccordionClass($province = false, $district = false, $municipality = false)
{
    if ($province == true && $district == true && $municipality == true) {
        return 'school-sidebar-active';
    }
    return '';
}

/**
 * @return mixed
 */
function getSelectedDistrict($districtId)
{
    return app(\App\Http\Services\Location\DistrictService::class)->model->where('id', $districtId)->get(['id', 'name as text']);
}

/**
 * @return mixed
 */
function getSelectedMunicipality($municipalityId)
{
    return app(\App\Http\Services\Location\MunicipalityService::class)->model->where('id', $municipalityId)->get(['id', 'name as text']);
}

/**
 * @return mixed
 */
function getSelectedGrade($gradeId)
{
    return app(\App\Http\Services\Grade\GradeService::class)->model->where('id', $gradeId)->get(['id', 'name as text']);
}

if (!function_exists('redirectWithSystemError')) {
    /**
     * redirect to top page with system error.
     *
     * @param $route
     * @param string $errorMessage
     * @return RedirectResponse
     */
    function redirectWithSystemError($route, $errorMessage = 'Something went wrong! Please retry.')
    {
        return redirect()->route($route)->with('system_error', $errorMessage);
    }
}

function getImageUrl($image = null, $size=null) {
    if($image) {
        if($size) {
            return Storage::url($size.'/'.$image) ?? null;
        }
        return Storage::url($image) ?? null;
    }


   return defaultLogo($size);
}

function defaultLogo($size=null) {
    $logo = app(\App\Http\Services\Setting\SettingService::class)->query()->whereHas('user', function ($query) {
        return $query->where('role_id', RoleConstant::ADMIN_ID);
    })->firstOrFail()->logo;
    if($logo) {
        if($size) {
            return Storage::url($size.'/'.$logo) ?? null;
        }
        return Storage::url($logo) ?? null;
    }
    return null;
}

function getPreviousRouteName() {
    return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
}

function getPreviousUrl() {
    return url()->previous();
}


function getCurrentRouteName() {
    return request()->route()->getName();
}

function getActiveAccordion($id=null, $provinceId =null, $districtId=null, $municipalityId = null, $type=null, $all=false) {
   if($id==null && $provinceId == null && $districtId == null && $municipalityId == null && $type==null) {
       return 'active';
   }
   if($type =='province') {
       if($provinceId) {
           if (decrypt($provinceId) == $id) {
               return 'show active';
           }

       }

       if($districtId && $all==false) {
           $district = app(\App\Http\Services\Location\DistrictService::class)->findOrFail(decrypt($districtId));
           if($district->province_id == $id) {
               return 'show active';
           }

       }
       if($municipalityId && $all==false) {
           $municipality = app(\App\Http\Services\Location\MunicipalityService::class)->findOrFail(decrypt($municipalityId));
           $municipality->load('district');
           if($municipality->district->province_id == $id) {
               return 'show active';
           }
       }
   }

    if($type == 'district') {
        if($districtId) {
            if (decrypt($districtId) == $id) {
                return 'show active';
            }
        }
        if($municipalityId && $all==false) {
            $municipality = app(\App\Http\Services\Location\MunicipalityService::class)->findOrFail(decrypt($municipalityId));
            if($municipality->district_id == $id) {
                return 'show active';
            }
        }
    }

    if($type == 'municipality') {
        if($municipalityId) {
            if(decrypt($municipalityId) == $id ) {
                return 'show active';
            }
        }
    }

    return null;
}
