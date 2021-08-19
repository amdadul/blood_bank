<?php

namespace App\Http\Controllers;


use App\PostOffice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostOfficeController extends Controller
{
    public function getPostOfficeName(Request $request): ?JsonResponse
    {
        if ($request->has('police_station_id')) {
            $post = new PostOffice();
            $post = $post->select('id', 'name');
            $post = $post->where('police_station_id', '=', $request->police_station_id)->get();
            if (!empty($post)) {
                foreach ($post as $dt) {
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
