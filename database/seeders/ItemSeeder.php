<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();
        $csvFile = fopen(base_path("database/seeders/item.csv"), "r");

        $firstline = true;
        $i = 1;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                Item::create([
                    "itm_code"  => $data['0']  ?? null,
                    "itm_desc"  => $data['1']  ?? null,
                    "itm_umpcs" => $data['3']  ?? null,
                    "itm_price" => floatval($data['4']) ?? null,
                    "itm_cost" => floatval($data['5']) ?? null,
                    "itm_inv" => floatval(0.00),
                    'itm_vatflg' => false,
                    'itm_min' => floatval(0.00),
                    'itm_max' => floatval(0.00),
                    'itm_type'  => $data['10']  ?? null,
                    'itm_cat' => intval($data['12']) ?? null,
                    "itm_mtype" => $data['16'] ?? null,
                    "itm_block" => intval($data['17']) == 0 ? 0 : 1,
                    "itm_unttg"  => intval($data['18']),
                    "itm_navcod" => $data['19'],
                    'itm_rtrade' => intval($data['24']),
                    'itm_trade' => intval($data['25']),
                    'itm_cat2' => $data['26'],
                    "itm_scat2" => $data['27'],
                    // "sup_code" => $data['0']  ?? null,
                    // "sup_name" => $data['1'] ?? null,
                    // "sup_address" => $data['2']  ?? null,
                    // "sup_type" => $data['4']  ?? null,
                    // "sup_pay" => $data['5']  ?? null,
                    // "sup_block" => $data['6'] === 'FALSE'  ? 0 : 1,
                    // 'sup_gl_code' => $data['7']  ?? null,
                    // 'sup_nav_code' => $data['8']  ?? null,
                    // 'sup_stat' => $data['9'] === 'Active' ? 1 : 0,
                    // 'sup_conamt' => floatval($data['10']) ?? null,
                    // 'sup_cur' => $data['11'] ?? null,
                    // 'sup_trade' => intval($data['12']) ?? null,
                    // "sup_pcode" => $data['13'] ?? null,
                    // "sup_ext" => intval($data['14']),
                    // "sup_cpos" => $data['15'] ?? null,
                    // "sup_vpos" => $data['16'] ?? null,
                    // "sup_spos" => $data['17'] ?? null,


                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
