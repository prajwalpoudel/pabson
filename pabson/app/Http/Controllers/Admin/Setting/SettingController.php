<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Constants\ImageSizeConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Services\Setting\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * SettingController constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = me('admin')->setting;

        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->settingService->findOrFail($id);

        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $setting = $this->settingService->findOrFail($id);
        $settingData = $request->all();
        if($logo = $request->file('logo')) {
            // delete file if already exists at the path.
            if (Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
                foreach(ImageSizeConstant::ADMINLOGO as $key=>$size) {
                    Storage::delete($key.'/'.$setting->logo);
                }
            }
            $settingData = $this->saveLogo($logo, $request->all());
        }
        $setting->update($settingData);

        return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $school
     * @return string
     */
    private function saveLogo($image, $storeData)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $storeData = array_merge(
            $storeData,
            [
                'logo' => Storage::putFileAs('admin/logo', $image, $image_name)
            ]
        );
        $resizedImage = Image::make($image);
        $resizedImage->backup();
        foreach (ImageSizeConstant::ADMINLOGO as $key=>$size) {
            Storage::put('/'.$key.'/admin/logo/'.$image_name, $resizedImage->resize($size['width'],$size['height'])->encode());
            $resizedImage->reset();
        }

        return $storeData;
    }
}
