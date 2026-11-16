<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{

    private $e = 2.718;

    public function list()
    {
        return view("main", []);
    }

    public function fuel(Request $request)
    {
        $sped1 = $request->input('sped1', 0);
        $sped2 = $request->input('sped2', 0);
        $save =  $request->input('save');
        if ($save) {

            $validator = Validator::make($request->all(), [
                'sped1' => 'required|int',
                'sped2' => 'required|int',
            ]);

            if ($validator->fails()) {
                $validated = $validator->errors()->all();
                return view("fuel", ["sped1" =>  $sped1, "sped2" =>  $sped2, 'errorforms' => implode(", ", $validated),  "calco" => []]);
            } else {
                $validated = $validator->validated();
                $potega = $validated['sped2'] / $validated['sped1'];
                $ecalc = pow($this->e, $potega);
                $ecalc = $ecalc - 1;
                $calco['mk'] = 1 / $ecalc;

                return view("fuel", ["sped1" => $validated['sped1'], "sped2" => $validated['sped2'],  "calco" => $calco]);
            }
        }
        return view("fuel", ["sped1" =>  $sped1, "sped2" =>  $sped2, "calco" => []]);
    }
}
