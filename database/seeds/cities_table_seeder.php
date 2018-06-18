<?php

use Illuminate\Database\Seeder;
use App\Models\City\City;

class cities_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'        => 'الأسكندرية',
        ]);
        City::create([
            'name'        => 'القاهره',
        ]);
        City::create([
            'name'        => 'الجيزة',
        ]);
        City::create([
            'name'        => 'أسيوط',
        ]);
        City::create([
            'name'        => 'الأقصر',
        ]);
        City::create([
            'name'        => 'الاسماعيلية',
        ]);
        City::create([
            'name'        => 'البحر الأحمر',
        ]);
        City::create([
            'name'        => 'البحيره',
        ]);
        City::create([
            'name'        => 'الدقهلية',
        ]);
        City::create([
            'name'        => 'السويس',
        ]);
        City::create([
            'name'        => 'الشرقية',
        ]);
        City::create([
            'name'        => 'الغربية',
        ]);
        City::create([
            'name'        => 'الفيوم',
        ]);
        City::create([
            'name'        => 'القليوبية',
        ]);
        City::create([
            'name'        => 'المنوفية',
        ]);
        City::create([
            'name'        => 'المنيا',
        ]);
         City::create([
            'name'        => 'الوادى الجديد',
        ]);
         City::create([
            'name'        => 'بني سويف ',
        ]);
         City::create([
            'name'        => 'بورسعيد',
        ]); 
        City::create([
            'name'        => 'جنوب سيناء',
        ]);
         City::create([
            'name'        => 'دمياط',
        ]);
         City::create([
            'name'        => 'سوهاج',
        ]);
         City::create([
            'name'        => 'شمال سيناء ',
        ]);
        City::create([
            'name'        => 'قنا',
        ]);

      
    }
}
