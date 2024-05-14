<?php

namespace App\Http\Controllers;

use App\Http\Middleware\NumChecker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    public function passView()
    {
        return view("calculate", [
            "prevVal" => null
        ]);
    }

    public function calculate(Request $request)
    {
        $income = $request->income;

        $average = DB::table('rates')
            ->where('income_from', '<=', $income)
            ->where('income_to', '>=', $income)
            ->select('percentage')
            ->get();
        if ($average) {
            $tax = $income * ($average[0]->percentage / 100);
            return view("calculate", [
                "tax" => $tax
            ]);
        }
    }
}
