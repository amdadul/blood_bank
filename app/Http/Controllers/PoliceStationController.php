<?php

namespace App\Http\Controllers;

use App\PoliceStation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PoliceStationController extends Controller
{
    public function getPoliceStationName(Request $request): ?JsonResponse
    {
        $request->validate(
            [
                'district_id' => 'required',
            ]
        );
        if ($request->has('district_id')) {
            $police = new PoliceStation();
            $police = $police->select('id', 'name');
            $police = $police->where('district_id', '=', $request->district_id)->get();
            if (!empty($police)) {
                foreach ($police as $dt) {
                    $response[] = array("id" => $dt->id, "name" => $dt->name);
                }
            } else {
                $response[] = array("id" => '', "name" => 'No data found!');
            }
        } else {
            $response[] = array("id" => '', "name" => 'No data found!');
        }
        return response()->json($response);
    }
}
