<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulation;

class RegulationController extends Controller
{
    public function specializations($regulation_code) {
        return response(json_decode(Regulation::findOrFail($regulation_code)->first()->specializations), 200);
    }

    public function storeSpecializations(Request $request, $regulation_code) {
        $validatedAttributes = $request->validate([
            'specialization_code' => 'required|min:2',
            'specialization_title' => 'required',
        ]);

        $regulation = Regulation::findOrFail($regulation_code);
        $specializations = json_decode($regulation->specializations);
        if ($specializations == null) $specializations = [];
        $keys = array_map(function($t) {
            return strtoupper($t->specialization_code);
        }, $specializations);
        if (array_search(strtoupper($request->specialization_code), $keys)) {
            return response("Duplicate specialization code", 409);
        }

        array_push($specializations, ['specialization_code' => $request->specialization_code, 'specialization_title' => $request->specialization_title]);
        $regulation->specializations = json_encode($specializations);
        $regulation->update();

        return response(json_decode($regulation->specializations), 200);
    }
}
