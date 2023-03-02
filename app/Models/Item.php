<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        "itm_code",
        "itm_desc",
        "itm_umpcs",
        "itm_price",
        "itm_cost",
        "itm_inv",
        'itm_vatflg',
        'itm_min',
        'itm_max',
        'itm_type',
        'itm_cat',
        'itm_scat',
        "itm_mtype",
        "itm_block",
        "itm_unttg",
        "itm_navcod",
        "itm_sobloc",
        "itm_lascos",
        'itm_pitem',
        'itm_rtrade',
        'itm_trade',
        'itm_cat2',
        "itm_scat2",
        "itm_rrcod",
    ];
    public function packing()
    {
        return $this->hasMany(Packing::class, 'pck_itmcd', 'itm_code');
    }
}
