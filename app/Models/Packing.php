<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    use HasFactory;
    protected $fillable = [
        "pck_itmcd",
        "pck_pckds",
        "pck_pckpr",
        "pck_pckcst",
        "pck_pckqty",
        "pck_block",
        "pck_status",
    ];
}
