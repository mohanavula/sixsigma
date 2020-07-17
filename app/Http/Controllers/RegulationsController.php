<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulation;

class RegulationsController extends Controller
{
    public function index()
    {
        return Regulation::with('program')->get();
    }

    public function get_regulation($regulation_id) {
        if (is_numeric($regulation_id)) {
            return Regulation::with('program')->findOrFail($regulation_id);
        } else {
            return Regulation::with('program')->where('short_name', $regulation_id)->firstOrFail();
        }
    }

    public function get_semesters($regulation_id)
    {
        if (is_numeric($regulation_id)) {
            return Regulation::findOrFail($regulation_id)->semesters;
        } else {
            return Regulation::where('short_name', $regulation_id)->firstOrFail()->semesters;
        }
    }

    public function get_instruction_scheme($regulation_id, $semester_id = null)
    {
        if (is_numeric($regulation_id)) {
            $semesters = Regulation::findOrFail($regulation_id)->semesters;
        } else {
            $semesters = Regulation::where('short_name', $regulation_id)->firstOrFail()->semesters;
        }

        if (isset($semester_id)) {
            if ($semesters->contains('sequence_number', '=', $semester_id))
                return $semesters->find($semester_id)->instruction_scheme;
            else
                return response(["message" => "Scheme cannot be found"], 400);
        } else {
            return $semesters->map(function($s) {
                return $s->instruction_scheme;
            });
        }
    }

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
