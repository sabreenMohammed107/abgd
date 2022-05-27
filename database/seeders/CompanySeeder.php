<?php

namespace Database\Seeders;

use App\Models\Compamy_contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Compamy_contact::create([
            'address_ar'=>'قطعة 508، مخازن الشباب، منطقة',
            'address_en'=>'قطعة 508، مخازن الشباب، منطقة',

        'phones'=>'  <span>201001140214</span>  <span>201033597474</span>
        ',
        'email'=>'admin@gmail.com',
        'facebook'=>Null,
        'twitter'=>Null,
        'instagram'=>Null,
        'linkedin'=>Null,
        ]);

    }
}
