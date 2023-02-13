<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "cus_code",
        "cus_name",
        "cus_cstat",
        "cus_address",
        "cus_prccd",
        "cus_gl_code",
        'cus_navcd',
        'cus_type',
        'cus_ext',
        'cus_conamt',
        'cus_mem',
        'cus_block',
        "cus_paytrm",
        "cus_trade",
        "cus_cur",
        "cus_wtchls",
        "cus_credlimit",
        "cus_shrink",
        'cus_ctype',
        'cus_crdtl',
        'cus_gpos',
        'cus_vpos',
        'cus_cpos',
        'cus_mcode',
        'cus_pcs',
        'cus_walk',
        'cus_ewht',
        'cus_export',
        'cus_panel',
    ];
}
