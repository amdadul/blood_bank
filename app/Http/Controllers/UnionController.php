<?php

namespace App\Http\Controllers;

use App\Union;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function getUnionName(Request $request): ?JsonResponse
    {
        if ($request->has('post_office_id')) {
            $union = new Union();
            $union = $union->select('id', 'name');
            $union = $union->where('post_office_id', '=', $request->post_office_id)->get();
            if (!empty($union)) {
                foreach ($union as $dt) {
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
