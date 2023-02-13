<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        "sup_code",
        "sup_name",
        "sup_address",
        "sup_type",
        "sup_pay",
        "sup_block",
        'sup_gl_code',
        'sup_nav_code',
        'sup_stat',
        'sup_conamt',
        'sup_cur',
        'sup_trade',
        "cus_paytrm",
        "sup_pcode",
        "sup_ext",
        "sup_cpos",
        "sup_vpos",
        "sup_spos",
    ];
}
