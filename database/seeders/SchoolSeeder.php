<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
//     Aspire International School
// Brilliance Language School
// Capital School
// Continental Palace International School
// Dome International School (DIS)
// ...............
// El Gouna International School (EGIS)
// Elite Language School
// Future International School
// Gateway International School
// GEMS British International School-Madinty
// ............
// GEMS British School-Al Rehab
// Glory Language School
// Kaumeya Language School
// Knowledge Language School
// Madinty Integrated Language Schools (MILS)
// .............
// Madinty Language School
// Metropolitan School
// New Sunrise International School
// New Vision International School
// Sakkara Language School
    protected $schools = [
        [
            'name_ar' => 'Brandon',
            'name_en' => ' Aspire International School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Brilliance Language School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Capital School',

        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Continental Palace International School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Dome International School (DIS)',

        ],

        [
            'name_ar' => 'Brandon',
            'name_en' => '  El Gouna International School (EGIS)',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Elite Language School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Future International School',

        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Gateway International School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'GEMS British International School-Madinty',

        ],
       [
            'name_ar' => 'Brandon',
            'name_en' => ' GEMS British School-Al Rehab',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Glory Language School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Kaumeya Language School',

        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Knowledge Language School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Madinty Integrated Language Schools (MILS)',

        ],

 [
            'name_ar' => 'Brandon',
            'name_en' => ' Madinty Language School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Metropolitan School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'New Sunrise International School',

        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'New Vision International School',
        ],
        [
            'name_ar' => 'Brandon',
            'name_en' => 'Sakkara Language School',

        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->schools as $school) { School::create($school); }
    }
}
