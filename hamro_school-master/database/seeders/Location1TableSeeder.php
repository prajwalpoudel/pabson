<?php

use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\ProvinceService;
use Illuminate\Database\Seeder;

class Location1TableSeeder extends Seeder
{
    /**
     * @var ProvinceService
     */
    private $provinceService;
    /**
     * @var DistrictService
     */
    private $districtService;
    /**
     * @var MunicipalityService
     */
    private $municipalityService;

    /**
     * LocationTableSeeder constructor.
     * @param ProvinceService $provinceService
     * @param DistrictService $districtService
     * @param MunicipalityService $municipalityService
     */
    public function __construct(
        ProvinceService $provinceService,
        DistrictService $districtService,
        MunicipalityService $municipalityService
    )
    {
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->municipalityService = $municipalityService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            //  Province 1
            [
                'name' => 'Province 1',
                'districts' => [
                    [
                        'name' => 'Bhojpur',
                    ],
                    [
                        'name' => 'Dhankuta',
                    ],
                    [
                        'name' => 'Illam',
                    ],
                    [
                        'name' => 'Jhapa',
                    ],
                    [
                        'name' => 'Khotang',
                    ],
                    [
                        'name' => 'Morang',
                        'municipalities' => [
                            [
                                'name' => 'Biratnagar'
                            ],
                            [
                                'name' => 'Letang'
                            ],
                            [
                                'name' => 'Rangeli'
                            ],
                        ]
                    ],
                    [
                       'name' => 'Okhaldhunga',
                    ],
                    [
                        'name' => 'Panchthar',
                    ],
                    [
                        'name' => 'Sankhuwasabha',
                    ],
                    [
                        'name' => 'Solukhumbu',
                    ],
                    [
                        'name' => 'Sunsari',
                    ],
                    [
                        'name' => 'Taplejung',
                    ],
                    [
                        'name' => 'Tehrathum',
                    ],
                    [
                        'name' => 'Udaypur',
                    ],
                ]
            ],
            //  Province 2
            [
                'name' => 'Province 2',
                'districts' => [
                    [
                        'name' => 'Bara',
                    ],
                    [
                        'name' => 'Dhanusha',
                    ],
                    [
                        'name' => 'Mahottari',
                    ],
                    [
                        'name' => 'Parsa',
                    ],
                    [
                        'name' => 'Rautahat',
                    ],
                    [
                        'name' => 'Saptari',
                    ],
                    [
                        'name' => 'Sarlahi',
                    ],
                    [
                        'name' => 'Siraha',
                    ],
                ]
            ],
            //  Province 3
            [
                'name' => 'Province 3'
            ],
            //  Province 4
            [
                'name' => 'Province 4'
            ],
            //  Province 5
            [
                'name' => 'Province 5'
            ],
            //  Province 6
            [
                'name' => 'Province 6'
            ],
            //  Province 7
            [
                'name' => 'Province 7'
            ],
        ];

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        $this->municipalityService->truncate();
        $this->districtService->truncate();
        $this->provinceService->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
        foreach($provinces as $province) {
            $districts = [];
            if(isset($province['districts'])) {
                $districts = $province['districts'];
                unset($province['districts']);
            }

            $province = $this->provinceService->create($province);

            foreach($districts as $district) {
                $municipalities = [];
                if(isset($district['municipalities'])) {
                    $municipalities = $district['municipalities'];
                    unset($district['municipalities']);
                }
                $district = $province->districts()->create($district);
                foreach($municipalities as $municipality) {
                    $district->municipalities()->create($municipality);
                }
            }
        }
    }
}
