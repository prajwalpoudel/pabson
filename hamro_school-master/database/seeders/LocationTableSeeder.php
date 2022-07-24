<?php

namespace Database\Seeders;

use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\ProvinceService;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
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
                        'municipalities' => [
                            [
                                'name' => 'Bhojpur'
                            ],
                            [
                                'name' => 'Shadanand'
                            ],
                            [
                                'name' => 'Hatuwagadhi'
                            ],
                            [
                                'name' => 'Ramprasad Rai'
                            ],
                            [
                                'name' => 'Aamchok'
                            ],
                            [
                                'name' => 'Tymke maiyunm'
                            ],
                            [
                                'name' => 'Arun Gaupalika'
                            ],
                            [
                                'name' => 'Pauwadungma'
                            ],
                            [
                                'name' => 'Salpasilichho'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dhankuta',
                        'municipalities' => [
                            [
                                'name' => 'Dhankuta'
                            ],
                            [
                                'name' => 'Pakhribas'
                            ],
                            [
                                'name' => 'Mahalaxmi'
                            ],
                            [
                                'name' => 'Sangurigadhi'
                            ],
                            [
                                'name' => 'Chaubise'
                            ],
                            [
                                'name' => 'Khalsa chhintang Sahidbhumi'
                            ],
                            [
                                'name' => 'Chhathar jorpati'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Illam',
                        'municipalities' => [
                            [
                                'name' => 'Illam'
                            ],
                            [
                                'name' => 'Deumai'
                            ],
                            [
                                'name' => 'Mai municipality'
                            ],
                            [
                                'name' => 'Suryodaya'
                            ],
                            [
                                'name' => 'Phakphotum'
                            ],
                            [
                                'name' => 'Maijogmai'
                            ],
                            [
                                'name' => 'Chulachuli'
                            ],
                            [
                                'name' => 'Rong'
                            ],
                            [
                                'name' => 'Mangsebung'
                            ],
                            [
                                'name' => 'Sandak'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Jhapa',
                        'municipalities' => [
                            [
                                'name' => 'Mechinagar'
                            ],
                            [
                                'name' => 'Bhadrapur'
                            ],
                            [
                                'name' => 'Birtamod'
                            ],
                            [
                                'name' => 'Arjundhara'
                            ],
                            [
                                'name' => 'Kankai'
                            ],
                            [
                                'name' => 'Shivasatakshi'
                            ],
                            [
                                'name' => 'Gauradaha'
                            ],
                            [
                                'name' => 'Damak'
                            ],
                            [
                                'name' => 'Buddhashanti'
                            ],
                            [
                                'name' => 'Haldibari'
                            ],
                            [
                                'name' => 'Kachankawal'
                            ],
                            [
                                'name' => 'Barhadashi'
                            ],
                            [
                                'name' => 'Jhapa'
                            ],
                            [
                                'name' => 'Gauriganj'
                            ],
                            [
                                'name' => 'Kamal'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Khotang',
                        'municipalities' => [
                            [
                                'name' => 'Diktel Rupakot Majhuwagadhi'
                            ],
                            [
                                'name' => 'Halesi Tuwachung'
                            ],
                            [
                                'name' => 'Khotehang'
                            ],
                            [
                                'name' => 'Diprung'
                            ],
                            [
                                'name' => 'Aiselukharka'
                            ],
                            [
                                'name' => 'Jantedhunga'
                            ],
                            [
                                'name' => 'Kepilasgadhi'
                            ],
                            [
                                'name' => 'Barahpokhari'
                            ],
                            [
                                'name' => 'Ruwabesi'
                            ],
                            [
                                'name' => 'Sakela'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Morang',
                        'municipalities' => [
                            [
                                'name' => 'Biratnagar'
                            ],
                            [
                                'name' => 'Sundarharaicha'
                            ],
                            [
                                'name' => 'Belbari'
                            ],
                            [
                                'name' => 'Pathari Sanischare'
                            ],
                            [
                                'name' => 'Urlabari'
                            ],
                            [
                                'name' => 'Rangeli'
                            ],
                            [
                                'name' => 'Letang Bhogateni'
                            ],
                            [
                                'name' => 'Ratuwamai'
                            ],
                            [
                                'name' => 'Sunawarshi'
                            ],
                            [
                                'name' => 'Kerabari'
                            ],
                            [
                                'name' => 'Miklajung'
                            ],
                            [
                                'name' => 'Kanepokhari'
                            ],
                            [
                                'name' => 'Budhiganga'
                            ],
                            [
                                'name' => 'Gramthan'
                            ],
                            [
                                'name' => 'Katahari'
                            ],
                            [
                                'name' => 'Dhanpalthan'
                            ],
                            [
                                'name' => 'Jahada'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Okhaldhunga',
                        'municipalities' => [
                            [
                                'name' => 'Siddhicharan'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Panchthar',
                        'municipalities' => [
                            [
                                'name' => 'Phidim'
                            ],
                            [
                                'name' => 'Kummayak'
                            ],
                            [
                                'name' => 'Miklajung'
                            ],
                            [
                                'name' => 'Phalelung'
                            ],
                            [
                                'name' => 'Phalgunanda'
                            ],
                            [
                                'name' => 'Tumbewa'
                            ],
                            [
                                'name' => 'Yangawarak'
                            ],
                            [
                                'name' => 'Hilihang'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sankhuwasabha',
                        'municipalities' => [
                            [
                                'name' => 'Bhotkhola'
                            ],
                            [
                                'name' => 'Chichila'
                            ],
                            [
                                'name' => 'Makalu'
                            ],
                            [
                                'name' => 'Sabhapokhari'
                            ],
                            [
                                'name' => 'Silichong'
                            ],
                            [
                                'name' => 'Chainpur'
                            ],
                            [
                                'name' => 'Dharmadevi'
                            ],
                            [
                                'name' => 'Khandbari'
                            ],
                            [
                                'name' => 'Madi'
                            ],
                            [
                                'name' => 'Panchakhapan'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Solukhumbu',
                        'municipalities' => [
                            [
                                'name' => 'Solududhkunda'
                            ],
                            [
                                'name' => 'Dudhakaushika'
                            ],
                            [
                                'name' => 'Necha Salyan'
                            ],
                            [
                                'name' => 'Dudhkoshi'
                            ],
                            [
                                'name' => 'Maha Kulung'
                            ],
                            [
                                'name' => 'Sotang'
                            ],
                            [
                                'name' => 'LIkhu pike'
                            ],
                            [
                                'name' => 'Khumbu Pasanglhamu'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sunsari',
                        'municipalities' => [
                            [
                                'name' => 'Itahari'
                            ],
                            [
                                'name' => 'Dharan'
                            ],
                            [
                                'name' => 'Inaruwa'
                            ],
                            [
                                'name' => 'Duhabi'
                            ],
                            [
                                'name' => 'Ramdhuni'
                            ],
                            [
                                'name' => 'Barachhetra'
                            ],
                            [
                                'name' => 'Koshi'
                            ],
                            [
                                'name' => 'Gadhi'
                            ],
                            [
                                'name' => 'Birju'
                            ],
                            [
                                'name' => 'Bhokraha Narashingh'
                            ],
                            [
                                'name' => 'Harinagara'
                            ],
                            [
                                'name' => 'Dewanganj'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Taplejung',
                        'municipalities' => [
                            [
                                'name' => 'Aathrai Triveni'
                            ],
                            [
                                'name' => 'Sidingwa'
                            ],
                            [
                                'name' => 'Sirijangha'
                            ],
                            [
                                'name' => 'Mikkwakhola'
                            ],
                            [
                                'name' => 'Meringden'
                            ],
                            [
                                'name' => 'Maiwakhola'
                            ],
                            [
                                'name' => 'Pathibhara Yangwarak'
                            ],
                            [
                                'name' => 'Fatthanglung'
                            ],
                            [
                                'name' => 'Phungling'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Tehrathum',
                        'municipalities' => [
                            [
                                'name' => 'Aathrai'
                            ],
                            [
                                'name' => 'Chhathar'
                            ],
                            [
                                'name' => 'Phedap'
                            ],
                            [
                                'name' => 'Menchayayem'
                            ],
                            [
                                'name' => 'Myanglung'
                            ],
                            [
                                'name' => 'Lagigurans'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Udaypur',
                        'municipalities' => [
                            [
                                'name' => 'Triyuga'
                            ],
                            [
                                'name' => 'Katari'
                            ],
                            [
                                'name' => 'Chaudandigadhi'
                            ],
                            [
                                'name' => 'Belaka'
                            ],
                            [
                                'name' => 'Udayapurgadhi'
                            ],
                            [
                                'name' => 'Rautamai'
                            ],
                            [
                                'name' => 'Tapli'
                            ],
                            [
                                'name' => 'Limchungbung'
                            ],
                        ]
                    ],
                ]
            ],
            //  Province 2
            [
                'name' => 'Province 2',
                'districts' => [
                    [
                        'name' => 'Bara',
                        'municipalities' => [
                            [
                                'name' => 'Kalaiya'
                            ],
                            [
                                'name' => 'Jeetpur Simara'
                            ],
                            [
                                'name' => 'Kolhabari'
                            ],
                            [
                                'name' => 'Nijgadh'
                            ],
                            [
                                'name' => 'Mahagadhimai'
                            ],
                            [
                                'name' => 'Simraungadh'
                            ],
                            [
                                'name' => 'Pacharauta'
                            ],
                            [
                                'name' => 'Pheta'
                            ],
                            [
                                'name' => 'Bishrampur'
                            ],
                            [
                                'name' => 'Prasauni'
                            ],
                            [
                                'name' => 'Adarsh Kotwal'
                            ],
                            [
                                'name' => 'Karaiyamai'
                            ],
                            [
                                'name' => 'Devtal'
                            ],
                            [
                                'name' => 'Parwani'
                            ],
                            [
                                'name' => 'Baragadhi'
                            ],
                            [
                                'name' => 'Suwarna'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dhanusha',
                        'municipalities' => [
                            [
                                'name' => 'Janakpur'
                            ],
                            [
                                'name' => 'Chhireshwarnath'
                            ],
                            [
                                'name' => 'Ganeshman Charanath'
                            ],
                            [
                                'name' => 'Dhanusadham'
                            ],
                            [
                                'name' => 'Nagarain'
                            ],
                            [
                                'name' => 'Bideha'
                            ],
                            [
                                'name' => 'Mithila'
                            ],
                            [
                                'name' => 'Sahidnagar'
                            ],
                            [
                                'name' => 'Sabaila'
                            ],
                            [
                                'name' => 'Kamala'
                            ],
                            [
                                'name' => 'Mithila Bihari'
                            ],
                            [
                                'name' => 'Hansapur'
                            ],
                            [
                                'name' => 'Janaknandani'
                            ],
                            [
                                'name' => 'Baleshwar'
                            ],
                            [
                                'name' => 'Mukhiyapatti Musharniya'
                            ],
                            [
                                'name' => 'Lakshminya'
                            ],
                            [
                                'name' => 'Aurahi'
                            ],
                            [
                                'name' => 'Dhanauji'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Mahottari',
                        'municipalities' => [
                            [
                                'name' => 'Aurahi'
                            ],
                            [
                                'name' => 'Balawa'
                            ],
                            [
                                'name' => 'Bardibas'
                            ],
                            [
                                'name' => 'Bhangaha'
                            ],
                            [
                                'name' => 'Gaushala'
                            ],
                            [
                                'name' => 'Jaleshwor'
                            ],
                            [
                                'name' => 'Loharpatti'
                            ],
                            [
                                'name' => 'Manarashiswa'
                            ],
                            [
                                'name' => 'Matihani'
                            ],
                            [
                                'name' => 'Ramgopalpur'
                            ],
                            [
                                'name' => 'Ekdara'
                            ],
                            [
                                'name' => 'Mahottari'
                            ],
                            [
                                'name' => 'Pipara'
                            ],
                            [
                                'name' => 'Samsi'
                            ],
                            [
                                'name' => 'Sonama'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Parsa',
                        'municipalities' => [
                            [
                                'name' => 'Birjung'
                            ],
                            [
                                'name' => 'Bahudarmi'
                            ],
                            [
                                'name' => 'Parsagadhi'
                            ],
                            [
                                'name' => 'Pokhariya'
                            ],
                            [
                                'name' => 'Bindabasni'
                            ],
                            [
                                'name' => 'Dhobini'
                            ],
                            [
                                'name' => 'Chhipaharmai'
                            ],
                            [
                                'name' => 'Jagarnathpur'
                            ],
                            [
                                'name' => 'Jirabhawani'
                            ],
                            [
                                'name' => 'Kalikamai'
                            ],
                            [
                                'name' => 'Pakaha Mainpur'
                            ],
                            [
                                'name' => 'Paterwa Sugauli'
                            ],
                            [
                                'name' => 'Thori'
                            ],
                            [
                                'name' => 'Sakhuwa Parsauni'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Rautahat',
                        'municipalities' => [
                            [
                                'name' => 'Baudhimai'
                            ],
                            [
                                'name' => 'Brindaban'
                            ],
                            [
                                'name' => 'Chandrapur'
                            ],
                            [
                                'name' => 'Dewahi Gahani'
                            ],
                            [
                                'name' => 'Gadhimai'
                            ],
                            [
                                'name' => 'Garuda'
                            ],
                            [
                                'name' => 'Gaur'
                            ],
                            [
                                'name' => 'Gujara'
                            ],
                            [
                                'name' => 'Ishanath'
                            ],
                            [
                                'name' => 'Katahariya'
                            ],
                            [
                                'name' => 'Madhav Narayan'
                            ],
                            [
                                'name' => 'Maulapur'
                            ],
                            [
                                'name' => 'Paroha'
                            ],
                            [
                                'name' => 'Phatuwa Bijayapur'
                            ],
                            [
                                'name' => 'Rajdevi'
                            ],
                            [
                                'name' => 'Rajpur'
                            ],
                            [
                                'name' => 'Durga Bhagwati'
                            ],
                            [
                                'name' => 'Yamunamai'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Saptari',
                        'municipalities' => [
                            [
                                'name' => 'Bodebarsain'
                            ],
                            [
                                'name' => 'Dakneshwori'
                            ],
                            [
                                'name' => 'Hanumannagar Kankalini'
                            ],
                            [
                                'name' => 'Kanchanrup'
                            ],
                            [
                                'name' => 'Khadak'
                            ],
                            [
                                'name' => 'Sambhunath'
                            ],
                            [
                                'name' => 'Saptakoshi'
                            ],
                            [
                                'name' => 'Surunga'
                            ],
                            [
                                'name' => 'Rajbiraj'
                            ],
                            [
                                'name' => 'Agnisaira Krishnasavaran'
                            ],
                            [
                                'name' => 'Balan Bihul'
                            ],
                            [
                                'name' => 'Rajgadh'
                            ],
                            [
                                'name' => 'Bishnupur'
                            ],
                            [
                                'name' => 'Chhinnamasta'
                            ],
                            [
                                'name' => 'Mahadeva'
                            ],
                            [
                                'name' => 'Rupani'
                            ],
                            [
                                'name' => 'Tilathi Koiladi'
                            ],
                            [
                                'name' => 'Tirhut'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sarlahi',
                        'municipalities' => [
                            [
                                'name' => 'Bagmati'
                            ],
                            [
                                'name' => 'Balara'
                            ],
                            [
                                'name' => 'Barahathwa'
                            ],
                            [
                                'name' => 'Godaita'
                            ],
                            [
                                'name' => 'Harion'
                            ],
                            [
                                'name' => 'Haripur'
                            ],
                            [
                                'name' => 'Haripurwa'
                            ],
                            [
                                'name' => 'Ishworpur'
                            ],
                            [
                                'name' => 'Kabilasi'
                            ],
                            [
                                'name' => 'Lalbandi'
                            ],
                            [
                                'name' => 'Malangwa'
                            ],
                            [
                                'name' => 'Basbariya'
                            ],
                            [
                                'name' => 'Bishnu'
                            ],
                            [
                                'name' => 'Brahampuri'
                            ],
                            [
                                'name' => 'Chakraghatta'
                            ],
                            [
                                'name' => 'Chandranagar'
                            ],
                            [
                                'name' => 'Dhankaul'
                            ],
                            [
                                'name' => 'Kaudena'
                            ],
                            [
                                'name' => 'Parsa'
                            ],
                            [
                                'name' => 'Ramnagar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Siraha',
                        'municipalities' => [
                            [
                                'name' => 'Bodebarsain'
                            ],
                            [
                                'name' => 'Dakneshwori'
                            ],
                            [
                                'name' => 'Hanumannagar Kankalini'
                            ],
                            [
                                'name' => 'Kanchanrup'
                            ],
                            [
                                'name' => 'Khadak'
                            ],
                            [
                                'name' => 'Sambhunath'
                            ],
                            [
                                'name' => 'Saptakoshi'
                            ],
                            [
                                'name' => 'Surunga'
                            ],
                            [
                                'name' => 'Rajbiraj'
                            ],
                            [
                                'name' => 'Agnisaira Krishnasavaran'
                            ],
                            [
                                'name' => 'Balan Bihul'
                            ],
                            [
                                'name' => 'Rajgadh'
                            ],
                            [
                                'name' => 'Bishnupur'
                            ],
                            [
                                'name' => 'Chhinnamasta'
                            ],
                            [
                                'name' => 'Mahadeva'
                            ],
                            [
                                'name' => 'Rupani'
                            ],
                            [
                                'name' => 'Tilathi Koiladi'
                            ],
                            [
                                'name' => 'Tirhut'
                            ],
                        ],
                    ],
                ],
            ],
            //  Province 3
            [
                'name' => 'Province 3',
                'districts' => [
                    [
                        'name' => 'Sindhuli',
                        'municipalities' => [
                            [
                                'name' => 'Kamalamai'
                            ],
                            [
                                'name' => 'Dudhauli'
                            ],
                            [
                                'name' => 'Sunkoshi'
                            ],
                            [
                                'name' => 'Hariharpur Gadhi'
                            ],
                            [
                                'name' => 'Tinpatan'
                            ],
                            [
                                'name' => 'Marin'
                            ],
                            [
                                'name' => 'Golanjor'
                            ],
                            [
                                'name' => 'Phikkal'
                            ],
                            [
                                'name' => 'Ghyanglekh'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ramechhap',
                        'municipalities' => [
                            [
                                'name' => 'Manthali'
                            ],
                            [
                                'name' => 'Ramechhap'
                            ],
                            [
                                'name' => 'Umakunda'
                            ],
                            [
                                'name' => 'Khandadevi'
                            ],
                            [
                                'name' => 'Doramba'
                            ],
                            [
                                'name' => 'Gokulganga'
                            ],
                            [
                                'name' => 'Likhutamakoshi'
                            ],
                            [
                                'name' => 'Sunapati'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Dolakha',
                        'municipalities' => [
                            [
                                'name' => 'Bhimeswor'
                            ],
                            [
                                'name' => 'Jiri'
                            ],
                            [
                                'name' => 'Kalinchowk'
                            ],
                            [
                                'name' => 'Melung'
                            ],
                            [
                                'name' => 'Bigu'
                            ],
                            [
                                'name' => 'Gaurishankar'
                            ],
                            [
                                'name' => 'Baileshwor'
                            ],
                            [
                                'name' => 'Sailung'
                            ],
                            [
                                'name' => 'Tamakoshi'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Bhaktapur',
                        'municipalities' => [
                            [
                                'name' => 'Bhaktapur'
                            ],
                            [
                                'name' => 'Changunarayan'
                            ],
                            [
                                'name' => 'Madhyapur Thimi'
                            ],
                            [
                                'name' => 'Suryabinayak'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dhading',
                        'municipalities' => [
                            [
                                'name' => 'Dhunibeshi'
                            ],
                            [
                                'name' => 'Nilkantha'
                            ],
                            [
                                'name' => 'Khaniyabas'
                            ],
                            [
                                'name' => 'Gajur'
                            ],
                            [
                                'name' => 'Galchhi'
                            ],
                            [
                                'name' => 'Gangajamukhi'
                            ],
                            [
                                'name' => 'Jwalamukhi'
                            ],
                            [
                                'name' => 'Thakre'
                            ],
                            [
                                'name' => 'Netrawati Dabjong'
                            ],
                            [
                                'name' => 'Benighat Rorang'
                            ],
                            [
                                'name' => 'Rubi Valley'
                            ],
                            [
                                'name' => 'Siddhalek'
                            ],
                            [
                                'name' => 'Tripurasundari'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kathmandu',
                        'municipalities' => [
                            [
                                'name' => 'Kathmandu'
                            ],
                            [
                                'name' => 'Budanilkantha'
                            ],
                            [
                                'name' => 'Chandragiri'
                            ],
                            [
                                'name' => 'Dakshinkali'
                            ],
                            [
                                'name' => 'Gokarneshwor'
                            ],
                            [
                                'name' => 'Kageshwari Manohara'
                            ],
                            [
                                'name' => 'Kirtipur'
                            ],
                            [
                                'name' => 'Nagarjun'
                            ],
                            [
                                'name' => 'Shankharapur'
                            ],
                            [
                                'name' => 'Tarakeshwor'
                            ],
                            [
                                'name' => 'Tokha'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kavrepalanchowk',
                        'municipalities' => [
                            [
                                'name' => 'Dhulikhel'
                            ],
                            [
                                'name' => 'Banepa'
                            ],
                            [
                                'name' => 'Panauti'
                            ],
                            [
                                'name' => 'Panchkhel'
                            ],
                            [
                                'name' => 'Namobudhha'
                            ],
                            [
                                'name' => 'Mandandeupur'
                            ],
                            [
                                'name' => 'Khani khola'
                            ],
                            [
                                'name' => 'Chauri Deurali'
                            ],
                            [
                                'name' => 'Temal'
                            ],
                            [
                                'name' => 'Bethanchok'
                            ],
                            [
                                'name' => 'Bhumlu'
                            ],
                            [
                                'name' => 'Mahabharat'
                            ],
                            [
                                'name' => 'Roshi'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Lalitpur',
                        'municipalities' => [
                            [
                                'name' => 'Lalitpur'
                            ],
                            [
                                'name' => 'Mahalaxmi'
                            ],
                            [
                                'name' => 'Godawari'
                            ],
                            [
                                'name' => 'Bagmati'
                            ],
                            [
                                'name' => 'Mahankal'
                            ],
                            [
                                'name' => 'Konjyoson'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Nuwakot',
                        'municipalities' => [
                            [
                                'name' => 'Bidur'
                            ],
                            [
                                'name' => 'Belkotgadhi'
                            ],
                            [
                                'name' => 'Kakani'
                            ],
                            [
                                'name' => 'Panchakanya'
                            ],
                            [
                                'name' => 'Likhu'
                            ],
                            [
                                'name' => 'Dupcheshowr'
                            ],
                            [
                                'name' => 'Shivapuri'
                            ],
                            [
                                'name' => 'Tadi'
                            ],
                            [
                                'name' => 'Suryagadhi'
                            ],
                            [
                                'name' => 'Tarkeshor'
                            ],
                            [
                                'name' => 'Kispang'
                            ],
                            [
                                'name' => 'Myagang'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Rasuwa',
                        'municipalities' => [
                            [
                                'name' => 'Uttargaya'
                            ],
                            [
                                'name' => 'Kalika'
                            ],
                            [
                                'name' => 'Gosaikunda'
                            ],
                            [
                                'name' => 'Naukunda'
                            ],
                            [
                                'name' => 'Aamachhodingmo'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sindhupalchowk',
                        'municipalities' => [
                            [
                                'name' => 'Chautara Sangachokgadi'
                            ],
                            [
                                'name' => 'Bahrabise'
                            ],
                            [
                                'name' => 'Melamchi'
                            ],
                            [
                                'name' => 'Balephi'
                            ],
                            [
                                'name' => 'Sunkoshi'
                            ],
                            [
                                'name' => 'Indrawati'
                            ],
                            [
                                'name' => 'Jugal'
                            ],
                            [
                                'name' => 'Panchapokhari Thangpal'
                            ],
                            [
                                'name' => 'Bhotekoshi'
                            ],
                            [
                                'name' => 'Lisankhu Pakhar'
                            ],
                            [
                                'name' => 'Helambu'
                            ],
                            [
                                'name' => 'Tripurasundari'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Chitwan',
                        'municipalities' => [
                            [
                                'name' => 'Bharatpur'
                            ],
                            [
                                'name' => 'Kalika'
                            ],
                            [
                                'name' => 'Khairahani'
                            ],
                            [
                                'name' => 'Madi'
                            ],
                            [
                                'name' => 'Ratnanagar'
                            ],
                            [
                                'name' => 'Rapti'
                            ],
                            [
                                'name' => 'Ichchhakamana'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Makwanpur',
                        'municipalities' => [
                            [
                                'name' => 'Hetauada'
                            ],
                            [
                                'name' => 'Thaha'
                            ],
                            [
                                'name' => 'Bhimphedi'
                            ],
                            [
                                'name' => 'Makawanpurgadhi'
                            ],
                            [
                                'name' => 'Manahari'
                            ],
                            [
                                'name' => 'Raksirang'
                            ],
                            [
                                'name' => 'Bakaiya'
                            ],
                            [
                                'name' => 'Bagmati'
                            ],
                            [
                                'name' => 'Kailash'
                            ],
                            [
                                'name' => 'Indrasarowar'
                            ],
                        ]
                    ],
                ]
            ],
            //  Province 4
            [
                'name' => 'Province 4',
                'districts' => [
                    [
                        'name' => 'Baglung',
                        'municipalities' => [
                            [
                                'name' => 'Dhorpatan'
                            ],
                            [
                                'name' => 'Galkot'
                            ],
                            [
                                'name' => 'Jaimuni'
                            ],
                            [
                                'name' => 'Bareng'
                            ],
                            [
                                'name' => 'Khatte khola'
                            ],
                            [
                                'name' => 'Taman khola'
                            ],
                            [
                                'name' => 'Tara khola'
                            ],
                            [
                                'name' => 'Nisikhola'
                            ],
                            [
                                'name' => 'Badigad'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Gorkha',
                        'municipalities' => [
                            [
                                'name' => 'Gorkha'
                            ],
                            [
                                'name' => 'Phaluntar'
                            ],
                            [
                                'name' => 'Sulikot'
                            ],
                            [
                                'name' => 'Siranchowk'
                            ],
                            [
                                'name' => 'Ajirkot'
                            ],
                            [
                                'name' => 'Tsum Nubri'
                            ],
                            [
                                'name' => 'Dharche'
                            ],
                            [
                                'name' => 'Bhimsen Thapa'
                            ],
                            [
                                'name' => 'Sahid lakhan'
                            ],
                            [
                                'name' => 'Aarughat'
                            ],
                            [
                                'name' => 'Gandaki'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kaski',
                        'municipalities' => [
                            [
                                'name' => 'Pokhara'
                            ],
                            [
                                'name' => 'Annapurna'
                            ],
                            [
                                'name' => 'Machhapuchhre'
                            ],
                            [
                                'name' => 'Madi'
                            ],
                            [
                                'name' => 'Rupa'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Lamjung',
                        'municipalities' => [
                            [
                                'name' => 'Besisahar'
                            ],
                            [
                                'name' => 'Madhya Nepal'
                            ],
                            [
                                'name' => 'Rainas'
                            ],
                            [
                                'name' => 'Sundarbazar'
                            ],
                            [
                                'name' => 'Dudhpokhari'
                            ],
                            [
                                'name' => 'Kwhlosothar'
                            ],
                            [
                                'name' => 'Marsyandi'
                            ],
                            [
                                'name' => 'Dorde'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Manang',
                        'municipalities' => [
                            [
                                'name' => 'Chame'
                            ],
                            [
                                'name' => 'Nason'
                            ],
                            [
                                'name' => 'Narpa Bhumi'
                            ],
                            [
                                'name' => 'Manang Ngisyang'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Mustang',
                        'municipalities' => [
                            [
                                'name' => 'Gharpajhong'
                            ],
                            [
                                'name' => 'Thasang'
                            ],
                            [
                                'name' => 'Barhagaun'
                            ],
                            [
                                'name' => 'Muktichhetra'
                            ],
                            [
                                'name' => 'Lomanthang'
                            ],
                            [
                                'name' => 'Dalome'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Myagdi',
                        'municipalities' => [
                            [
                                'name' => 'Beni'
                            ],
                            [
                                'name' => 'Annapurna'
                            ],
                            [
                                'name' => 'Dhaulagiri'
                            ],
                            [
                                'name' => 'Mangala'
                            ],
                            [
                                'name' => 'Malika'
                            ],
                            [
                                'name' => 'Raghuganga'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Nawalpur',
                        'municipalities' => [
                            [
                                'name' => 'Kawasoti'
                            ],
                            [
                                'name' => 'Gaindakot'
                            ],
                            [
                                'name' => 'Devachuli'
                            ],
                            [
                                'name' => 'Madhyabindu'
                            ],
                            [
                                'name' => 'Baudikali'
                            ],
                            [
                                'name' => 'Bulingtar'
                            ],
                            [
                                'name' => 'Binaya Triveni'
                            ],
                            [
                                'name' => 'Hupsekot'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Parbat',
                        'municipalities' => [
                            [
                                'name' => 'Kushma'
                            ],
                            [
                                'name' => 'Phalewas'
                            ],
                            [
                                'name' => 'Jaljala'
                            ],
                            [
                                'name' => 'Paiyun'
                            ],
                            [
                                'name' => 'Mahashila'
                            ],
                            [
                                'name' => 'Modi'
                            ],
                            [
                                'name' => 'Bihadi'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Syangja',
                        'municipalities' => [
                            [
                                'name' => 'Galyang'
                            ],
                            [
                                'name' => 'Chapakot'
                            ],
                            [
                                'name' => 'Putalibazar'
                            ],
                            [
                                'name' => 'Bheerkot'
                            ],
                            [
                                'name' => 'Waling'
                            ],
                            [
                                'name' => 'Arjun Chaupari'
                            ],
                            [
                                'name' => 'Aandhi Khola'
                            ],
                            [
                                'name' => 'Kaligandaki'
                            ],
                            [
                                'name' => 'Phedikhola'
                            ],
                            [
                                'name' => 'Harinas'
                            ],
                            [
                                'name' => 'Biruwa'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Tanahun',
                        'municipalities' => [
                            [
                                'name' => 'Bhanu'
                            ],
                            [
                                'name' => 'Bhimad'
                            ],
                            [
                                'name' => 'Byas'
                            ],
                            [
                                'name' => 'Shuklagandaki'
                            ],
                            [
                                'name' => 'Anbu Khaireni'
                            ],
                            [
                                'name' => 'Devghat'
                            ],
                            [
                                'name' => 'Bandipur'
                            ],
                            [
                                'name' => 'Rishing'
                            ],
                            [
                                'name' => 'Ghiring'
                            ],
                            [
                                'name' => 'Myagde'
                            ],
                        ]
                    ],
                ]
            ],
            //  Province 5
            [
                'name' => 'Province 5',
                'districts' => [
                    [
                        'name' => 'Arghakhanchi',
                        'municipalities' => [
                            [
                                'name' => 'Sandhikharka'
                            ],
                            [
                                'name' => 'Sitganga'
                            ],
                            [
                                'name' => 'Bhumikasthan'
                            ],
                            [
                                'name' => 'Chhatradev'
                            ],
                            [
                                'name' => 'Panini'
                            ],
                            [
                                'name' => 'Malarani'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Banke',
                        'municipalities' => [
                            [
                                'name' => 'Nepaljung'
                            ],
                            [
                                'name' => 'Kohalpur'
                            ],
                            [
                                'name' => 'Rapti Sonari'
                            ],
                            [
                                'name' => 'Narainapur'
                            ],
                            [
                                'name' => 'Duduwa'
                            ],
                            [
                                'name' => 'Janaki'
                            ],
                            [
                                'name' => 'Khajura'
                            ],
                            [
                                'name' => 'Baijanath'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Bardiya',
                        'municipalities' => [
                            [
                                'name' => 'Gulariya'
                            ],
                            [
                                'name' => 'Rajapur'
                            ],
                            [
                                'name' => 'Madhuwan'
                            ],
                            [
                                'name' => 'Thakurbaba'
                            ],
                            [
                                'name' => 'Basgadhi'
                            ],
                            [
                                'name' => 'Barbardiya'
                            ],
                            [
                                'name' => 'Badhaiyalal'
                            ],
                            [
                                'name' => 'Geruwa'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dang',
                        'municipalities' => [
                            [
                                'name' => 'Gharahi'
                            ],
                            [
                                'name' => 'Tulsipur'
                            ],
                            [
                                'name' => 'Lamahi'
                            ],
                            [
                                'name' => 'Gadhawa'
                            ],
                            [
                                'name' => 'Rajpur'
                            ],
                            [
                                'name' => 'Shantinagar'
                            ],
                            [
                                'name' => 'Rapti'
                            ],
                            [
                                'name' => 'Banglachuli'
                            ],
                            [
                                'name' => 'Dangisharan'
                            ],
                            [
                                'name' => 'Babai'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Eastern Rukum',
                        'municipalities' => [
                            [
                                'name' => 'Bhume'
                            ],
                            [
                                'name' => 'Putha Uttarganga'
                            ],
                            [
                                'name' => 'Sisne'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Gulmi',
                        'municipalities' => [
                            [
                                'name' => 'Musikot'
                            ],
                            [
                                'name' => 'Resunga'
                            ],
                            [
                                'name' => 'Ishma'
                            ],
                            [
                                'name' => 'Kaligandaki'
                            ],
                            [
                                'name' => 'Gulmi Darbar'
                            ],
                            [
                                'name' => 'Satyawati'
                            ],
                            [
                                'name' => 'Chandrakot'
                            ],
                            [
                                'name' => 'Chhatrakot'
                            ],
                            [
                                'name' => 'Dhurkot'
                            ],
                            [
                                'name' => 'Madane'
                            ],
                            [
                                'name' => 'Malika'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kapilvastu',
                        'municipalities' => [
                            [
                                'name' => 'Kapilvastu'
                            ],
                            [
                                'name' => 'Banganga'
                            ],
                            [
                                'name' => 'Buddhabhumi'
                            ],
                            [
                                'name' => 'Shivaraj'
                            ],
                            [
                                'name' => 'Krishnanagar'
                            ],
                            [
                                'name' => 'Maharajgunj'
                            ],
                            [
                                'name' => 'Mayadevi'
                            ],
                            [
                                'name' => 'Yashodhara'
                            ],
                            [
                                'name' => 'Suddhodhan'
                            ],
                            [
                                'name' => 'Bijaynagar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Parasi',
                        'municipalities' => [
                            [
                                'name' => 'Bardaghat'
                            ],
                            [
                                'name' => 'Ramgram'
                            ],
                            [
                                'name' => 'Sunawal'
                            ],
                            [
                                'name' => 'Susta'
                            ],
                            [
                                'name' => 'Palhinanda'
                            ],
                            [
                                'name' => 'Pratappur'
                            ],
                            [
                                'name' => 'Sarawal'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Palpa',
                        'municipalities' => [
                            [
                                'name' => 'Tansen'
                            ],
                            [
                                'name' => 'Rampur'
                            ],
                            [
                                'name' => 'Rainadevi Chhahara'
                            ],
                            [
                                'name' => 'Ripdikot'
                            ],
                            [
                                'name' => 'Bagnaskali'
                            ],
                            [
                                'name' => 'Rambha'
                            ],
                            [
                                'name' => 'Purbakhola'
                            ],
                            [
                                'name' => 'Nisdi'
                            ],
                            [
                                'name' => 'Mathagadi'
                            ],
                            [
                                'name' => 'Tinahu'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Pyuthan',
                        'municipalities' => [
                            [
                                'name' => 'Pyuthan'
                            ],
                            [
                                'name' => 'Swargadwari'
                            ],
                            [
                                'name' => 'Gaumukhi'
                            ],
                            [
                                'name' => 'Mandwi'
                            ],
                            [
                                'name' => 'Sarumarani'
                            ],
                            [
                                'name' => 'Mallarani'
                            ],
                            [
                                'name' => 'Naubahini'
                            ],
                            [
                                'name' => 'Jhimruk'
                            ],
                            [
                                'name' => 'Airawati'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Rolpa',
                        'municipalities' => [
                            [
                                'name' => 'Rolpa'
                            ],
                            [
                                'name' => 'Runtigadi'
                            ],
                            [
                                'name' => 'Triveni'
                            ],
                            [
                                'name' => 'Sunil Smiriti'
                            ],
                            [
                                'name' => 'Lungri'
                            ],
                            [
                                'name' => 'Sunchhahari'
                            ],
                            [
                                'name' => 'Thawang'
                            ],
                            [
                                'name' => 'Madi'
                            ],
                            [
                                'name' => 'Ganga Devi'
                            ],
                            [
                                'name' => 'Pariwartan'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Rupandehi',
                        'municipalities' => [
                            [
                                'name' => 'Butwal'
                            ],
                            [
                                'name' => 'Devdaha'
                            ],
                            [
                                'name' => 'Lumbini Sanskritik'
                            ],
                            [
                                'name' => 'Sainamaina'
                            ],
                            [
                                'name' => 'Siddharthanagar'
                            ],
                            [
                                'name' => 'Tilottama'
                            ],
                            [
                                'name' => 'Gaidahawa'
                            ],
                            [
                                'name' => 'Kanchan'
                            ],
                            [
                                'name' => 'Kotahimai'
                            ],
                            [
                                'name' => 'Marchawari'
                            ],
                            [
                                'name' => 'Mayadevi'
                            ],
                            [
                                'name' => 'Omshanti'
                            ],
                            [
                                'name' => 'Rohini'
                            ],
                            [
                                'name' => 'Sammarimai'
                            ],
                            [
                                'name' => 'Siyari'
                            ],
                            [
                                'name' => 'Suddodhan'
                            ],
                        ]
                    ],
                ]
            ],
            //  Province 6
            [
                'name' => 'Province 6',
                'districts' => [
                    [
                        'name' => 'Western Rukum',
                        'municipalities' => [
                           [
                              'name' => 'Musikot'
                            ],
                            [
                                'name' => 'Chaurjahari'
                            ],
                            [
                                'name' => 'Aathbiskot'
                            ],
                            [
                                'name' => 'Banphikot'
                            ],
                            [
                                'name' => 'Tribeni'
                            ],
                            [
                                'name' => 'Sani Bheri'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Salyan',
                        'municipalities' => [
                            [
                               'name' => 'Shaarda'
                            ],
                            [
                                'name' => 'Bagchaur'
                            ],
                            [
                                'name' => 'Bangaad Kupinde'
                            ],
                            [
                                'name' => 'Kalimati'
                            ],
                            [
                                'name' => 'Tribeni'
                            ],
                            [
                                'name' => 'Kapurkot'
                            ],
                            [
                                'name' => 'Chatreshwari'
                            ],
                            [
                                'name' => 'Kumakh'
                            ],
                            [
                                'name' => 'Siddha Kumakh'
                            ],
                            [
                                'name' => 'Darma'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dolpa',
                        'municipalities' => [
                            [
                               'name' => 'Thuli Bheri'
                            ],
                            [
                                'name' => 'Tripurasundari'
                            ],
                            [
                                'name' => 'Dolpa Buddha'
                            ],
                            [
                                'name' => 'Shey Phuksundo'
                            ],
                            [
                                'name' => 'Jagadulla'
                            ],
                            [
                                'name' => 'Mudkechula'
                            ],
                            [
                                'name' => 'Chatreshwari'
                            ],
                            [
                                'name' => 'Kaike'
                            ],
                            [
                                'name' => 'Chharke Tangsong'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Humla',
                        'municipalities' => [
                            [
                               'name' => 'Simkot'
                            ],
                            [
                                'name' => 'Numkha'
                            ],
                            [
                                'name' => 'Kharpunath'
                            ],
                            [
                                'name' => 'Sarkegad'
                            ],
                            [
                                'name' => 'Chankheli'
                            ],
                            [
                                'name' => 'Adanchuli'
                            ],
                            [
                                'name' => 'Tajkot'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Jumla',
                        'municipalities' => [
                            [
                               'name' => 'Chandannath'
                            ],
                            [
                                'name' => 'Kankasundari'
                            ],
                            [
                                'name' => 'Sinja'
                            ],
                            [
                                'name' => 'Hima'
                            ],
                            [
                                'name' => 'Tila'
                            ],
                            [
                                'name' => 'Guthichaur'
                            ],
                            [
                                'name' => 'Tatopani'
                            ],
                            [
                                'name' => 'Patarasi'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kalikot',
                        'municipalities' => [
                            [
                               'name' => 'Khandachakra'
                            ],
                            [
                                'name' => 'Raskot'
                            ],
                            [
                                'name' => 'Tilagufa'
                            ],
                            [
                                'name' => 'PachaliJharana'
                            ],
                            [
                                'name' => 'Sanni Tribeni'
                            ],
                            [
                                'name' => 'Narharinath'
                            ],
                            [
                                'name' => 'Shubha Kalika'
                            ],
                            [
                                'name' => 'Mahawai'
                            ],
                            [
                                'name' => 'Palata'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Muga',
                        'municipalities' => [
                            [
                               'name' => 'Chhayanath Rara'
                            ],
                            [
                                'name' => 'Mugum Karmarong'
                            ],
                            [
                                'name' => 'Soru'
                            ],
                            [
                                'name' => 'Khatyad'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Surkhet',
                        'municipalities' => [
                            [
                               'name' => 'Birendranagar'
                            ],
                            [
                                'name' => 'Bheriganga'
                            ],
                            [
                                'name' => 'Gurbhakot'
                            ],
                            [
                                'name' => 'Panchapuri'
                            ],
                            [
                                'name' => 'Lekhbesi'
                            ],
                            [
                                'name' => 'Chaukune'
                            ],
                            [
                                'name' => 'Barahatal'
                            ],
                            [
                                'name' => 'Chingad'
                            ],
                            [
                                'name' => 'Simta'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dailekh',
                        'municipalities' => [
                            [
                               'name' => 'Narayan'
                            ],
                            [
                                'name' => 'Dullu'
                            ],
                            [
                                'name' => 'Aathbis'
                            ],
                            [
                                'name' => 'Chamunda BIndrasaini'
                            ],
                            [
                                'name' => 'Thantikandh'
                            ],
                            [
                                'name' => 'Bhairabi'
                            ],
                            [
                                'name' => 'Mahabu'
                            ],
                            [
                                'name' => 'Naumule'
                            ],
                            [
                                'name' => 'Dungeshwar'
                            ],
                            [
                                'name' => 'Gurans'
                            ],
                            [
                                'name' => 'Bhagawatimai'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Jajarkot',
                        'municipalities' => [
                            [
                               'name' => 'Bheri'
                            ],
                            [
                                'name' => 'Chhedagad'
                            ],
                            [
                                'name' => 'Nalgad'
                            ],
                            [
                                'name' => 'Junichande'
                            ],
                            [
                                'name' => 'Kushe'
                            ],
                            [
                                'name' => 'Barekot'
                            ],
                            [
                                'name' => 'Shivalaya'
                            ],
                        ]
                    ],
                ]
            ],
            //  Province 7
            [
                'name' => 'Province 7',
                'districts' => [
                    [
                        'name' => 'Achham',
                        'municipalities' => [
                            [
                               'name' => 'Mangalsen'
                            ],
                            [
                                'name' => 'Kamalbazar'
                            ],
                            [
                                'name' => 'Sanfebagar'
                            ],
                            [
                                'name' => 'Panchadewal Binayak'
                            ],
                            [
                                'name' => 'Ramaroshan'
                            ],
                            [
                                'name' => 'Chaurpati'
                            ],
                            [
                                'name' => 'Turmakhand'
                            ],
                            [
                                'name' => 'Mellekh'
                            ],
                            [
                                'name' => 'Dhakari'
                            ],
                            [
                                'name' => 'Bannigadi Jayaqad'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Baitadi',
                        'municipalities' => [
                            [
                               'name' => 'Dasharathchand'
                            ],
                            [
                                'name' => 'Patan'
                            ],
                            [
                                'name' => 'Melauli'
                            ],
                            [
                                'name' => 'Purchaudi'
                            ],
                            [
                                'name' => 'Surma'
                            ],
                            [
                                'name' => 'Sigas'
                            ],
                            [
                                'name' => 'Shivanath'
                            ],
                            [
                                'name' => 'Panacheshwor'
                            ],
                            [
                                'name' => 'Dogdakedar'
                            ],
                            [
                                'name' => 'Dilasaini'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Bajhang',
                        'municipalities' => [
                            [
                               'name' => 'Jaya Prithivi'
                            ],
                            [
                                'name' => 'Bungal'
                            ],
                            [
                                'name' => 'Talkot'
                            ],
                            [
                                'name' => 'Masta'
                            ],
                            [
                                'name' => 'Khaptadchhanna'
                            ],
                            [
                                'name' => 'Thalara'
                            ],
                            [
                                'name' => 'Bitthadchir'
                            ],
                            [
                                'name' => 'Surma'
                            ],
                            [
                                'name' => 'Chhabis'
                            ],
                            [
                                'name' => 'Durgathali'
                            ],
                            [
                                'name' => 'Kedarsyu'
                            ],
                            [
                                'name' => 'Saipal'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Bajura',
                        'municipalities' => [
                            [
                               'name' => 'Badimalika'
                            ],
                            [
                                'name' => 'Triveni'
                            ],
                            [
                                'name' => 'Budhiganga'
                            ],
                            [
                                'name' => 'BUdhinanda'
                            ],
                            [
                                'name' => 'Gaumul'
                            ],
                            [
                                'name' => 'Jagnnath'
                            ],
                            [
                                'name' => 'Swamikartik khapar'
                            ],
                            [
                                'name' => 'Chhededaha'
                            ],
                            [
                                'name' => 'Himali'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Dadeldhura',
                        'municipalities' => [
                            [
                               'name' => 'Amargadhi'
                            ],
                            [
                                'name' => 'Parshuram'
                            ],
                            [
                                'name' => 'Aalitaal'
                            ],
                            [
                                'name' => 'Bhageshwar'
                            ],
                            [
                                'name' => 'Navadurga'
                            ],
                            [
                                'name' => 'Ajaymeru'
                            ],
                            [
                                'name' => 'Ganyapadhuta'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Darchula',
                        'municipalities' => [
                            [
                               'name' => 'Mahakali'
                            ],
                            [
                                'name' => 'Shailyasikhar'
                            ],
                            [
                                'name' => 'Malikarjun'
                            ],
                            [
                                'name' => 'Apihimal'
                            ],
                            [
                                'name' => 'Duhun'
                            ],
                            [
                                'name' => 'Naugad'
                            ],
                            [
                                'name' => 'Marma'
                            ],
                            [
                                'name' => 'Lekam'
                            ],
                            [
                                'name' => 'Vyans'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Doti',
                        'municipalities' => [
                            [
                               'name' => 'Dipayal Silgadhi'
                            ],
                            [
                                'name' => 'Shikhar'
                            ],
                            [
                                'name' => 'Purbichauki'
                            ],
                            [
                                'name' => 'Badikedar'
                            ],
                            [
                                'name' => 'Jorayal'
                            ],
                            [
                                'name' => 'Sayal'
                            ],
                            [
                                'name' => 'Aadarsha'
                            ],
                            [
                                'name' => 'Bogatan'
                            ],
                            [
                                'name' => 'Dr. K. I. Singh'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kailali',
                        'municipalities' => [
                            [
                               'name' => 'Dhangadhi'
                            ],
                            [
                                'name' => 'Lamki chuha'
                            ],
                            [
                                'name' => 'Tikapur'
                            ],
                            [
                                'name' => 'Ghodaghodi'
                            ],
                            [
                                'name' => 'Bhajani'
                            ],
                            [
                                'name' => 'Godawari'
                            ],
                            [
                                'name' => 'Gaurigoriya'
                            ],
                            [
                                'name' => 'Janaki'
                            ],
                            [
                                'name' => 'Bardaguriya'
                            ],
                            [
                                'name' => 'Mohanyal'
                            ],
                            [
                                'name' => 'Kailari'
                            ],
                            [
                                'name' => 'Joshipur'
                            ],
                            [
                                'name' => 'Chure'
                            ],
                        ]

                    ],
                ]
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
