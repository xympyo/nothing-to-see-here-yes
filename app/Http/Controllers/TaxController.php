<?php

namespace App\Http\Controllers;

use App\Http\Middleware\NumChecker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    public function calculate(Request $request)
    {
        $income = $request->income;

        if (!is_null($income)) {
            $average = DB::table('rates')
                ->where('income_from', '<=', $income)
                ->where('income_to', '>=', $income)
                ->select('percentage')
                ->get();
        }

        if ($request->attributes->get('isTrue')) {
            $tax = $income * ($average[0]->percentage / 100);
            $trueValue = $request->attributes->get("isTrue");
            return view("calculate", [
                "tax" => $tax,
                "trueValue" => $trueValue
            ]);
        } else {
            $trueValue = $request->attributes->get("isTrue");
            return view("calculate", [
                "trueValue" => $trueValue
            ]);
        }

        return view("calculate.form");
    }
}
