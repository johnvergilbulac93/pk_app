<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();
        $csvFile = fopen(base_path("database/seeders/customer.csv"), "r");

        $firstline = true;
        $i = 1;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                Customer::create([
                    "cus_code" => $data['0'],
                    "cus_name" => $data['1'],
                    "cus_cstat" => empty($data['2']) ? $data['2'] : '',
                    "cus_address" => $data['3'] ?? null,
                    "cus_prccd" => $data['5'] ?? null,
                    "cus_gl_code" => $data['6'] ?? null,
                    "cus_navcd" => $data['7'],
                    "cus_type" => $data['8'] === 'Active' ? true : false,
                    "cus_ext" => intval($data['9']) ?? null,
                    "cus_conamt" => floatval($data['10']) ?? null,
                    "cus_mem" => $data['11'] === 'FALSE' ? false : true,
                    "cus_block" => $data['12'] === 'FALSE' ? false : true,
                    "cus_paytrm" => $data['13'] ?? null,
                    "cus_trade" => intval($data['14']) ?? null,
                    "cus_cur" => $data['15'] ?? null,
                    "cus_wtchls" => $data['16'] === 'FALSE' ? false : true,
                    "cus_credlimit" => floatval($data['17']),
                    "cus_shrink" => intval($data['18']) == 0 ? 0 : 1,
                    "cus_ctype" => $data['19'] ?? null,
                    "cus_crdtl" => intval($data['20']) ?? null,
                    "cus_gpos" => $data['21'] ?? null,
                    "cus_vpos" => $data['22'] ?? null,
                    "cus_cpos" => $data['23'] ?? null,
                    'cus_mcode' => intval($data['24']) ?? null,
                    'cus_pcs' => $data['25'] === 'FALSE' ? false : true,
                    'cus_walk' => $data['26'] === 'FALSE' ? false : true,
                    'cus_ewht' => intval($data['27']) ?? null,
                    'cus_export' => false,
                    'cus_panel' => $data['29'] === 'FALSE' ? false : true,

                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
