<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::truncate();
        $csvFile = fopen(base_path("database/seeders/supplier.csv"), "r");

        $firstline = true;
        $i = 1;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                Supplier::create([
                    "sup_code" => $data['0']  ?? null,
                    "sup_name" => $data['1'] ?? null,
                    "sup_address" => $data['2']  ?? null,
                    "sup_type" => $data['4']  ?? null,
                    "sup_pay" => $data['5']  ?? null,
                    "sup_block" => $data['6'] === 'FALSE'  ? 0 : 1,
                    'sup_gl_code' => $data['7']  ?? null,
                    'sup_nav_code' => $data['8']  ?? null,
                    'sup_stat' => $data['9'] === 'Active' ? 1 : 0,
                    'sup_conamt' => floatval($data['10']) ?? null,
                    'sup_cur' => $data['11'] ?? null,
                    'sup_trade' => intval($data['12']) ?? null,
                    "sup_pcode" => $data['13'] ?? null,
                    "sup_ext" => intval($data['14']),
                    "sup_cpos" => $data['15'] ?? null,
                    "sup_vpos" => $data['16'] ?? null,
                    "sup_spos" => $data['17'] ?? null,
                

                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
