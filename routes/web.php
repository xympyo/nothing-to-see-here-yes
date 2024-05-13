<?php

use App\Http\Middleware\NumChecker;
use Illuminate\Support\Facades\Route;

Route::get("/calculate", function () {
    return view("calculate");
})->name("calculate");
Route::post("/calculate", [App\Http\Controllers\TaxController::class, "calculate"])->middleware([NumChecker::class])->name("calculate.cal");
