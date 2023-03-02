<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use App\Models\PriceGroup;
use Illuminate\Http\Request;
use App\Http\Resources\PriceGroupResource;
use App\Http\Resources\PackingPerItemResource;
use App\Http\Resources\PriceGroupOptionResource;

class OptionController extends Controller
{
    public function price_group()
    {
        return PriceGroupOptionResource::collection(PriceGroup::get());
    }
    public function packing_per_item($id)
    {
        return PackingPerItemResource::collection(Packing::where('pck_itmcd', $id)->get());
    }
}
