<?php

namespace Database\Seeders;

use App\Models\PriceGroup;
use Illuminate\Database\Seeder;

class PriceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceGroup::truncate();
        $csvFile = fopen(base_path("database/seeders/price_group.csv"), "r");
        $firstline = true;
        $i = 1;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                PriceGroup::create([
                    "prc_code"  => $data['0']  ?? null,
                    "prc_name"  => $data['1']  ?? null,
                    "prc_stat" => 1,

                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
