<?php

namespace App\Http\Controllers\Masterfile;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\PackingRequest;
use App\Models\Packing;

class ItemController extends Controller
{
    //

    public function index(Request $request)
    {
        $result =   Item::query()->when($request->search, function ($query, $search) {
            $query->where('itm_code', 'like', '%' . $search . '%');
            $query->orWhere('itm_desc', 'like', '%' . $search . '%');
        })->with(['packing'])->orderBy('id', 'DESC')->paginate($request->limit);

        return response()->json(
            [
                "message" => 'Items Fetch Successfully',
                "data" => $result
            ],
            200
        );
    }
    public function addPacking(PackingRequest $request)
    {
        $result = Packing::create([
            'pck_itmcd' => $request->itemcode,
            'pck_pckds' => strtoupper($request->description),
            'pck_pckqty' => $request->quantity
        ]);
        return response()->json(
            [
                "message" => 'Packing Created Successfully',
                "data" => $result
            ],
            201
        );
    }
    public function showPacking($id)
    {
        $result = Packing::where('pck_itmcd', $id)->get();
        return response()->json(
            [
                "message" => 'Packing Fetch Successfully',
                "data" => $result
            ],
            200
        );
    }
    public function deletePacking($id)
    {

        $packing = Packing::find($id);
        $packing->delete();
        return response()->json(
            [
                "message" => 'Packing Deleted Successfully',
                "data" => null
            ],
            200
        );
    }
    public function updatePacking(Request $request, $id)
    {

        Packing::whereId($id)->update([
            'pck_pckds' => strtoupper($request->packing),
            'pck_pckqty' => $request->quantity
        ]);
        return response()->json(
            [
                "message" => 'Packing Updated Successfully',
                "data" =>  $request->description
            ],
            200
        );
    }
}
