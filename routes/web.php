<?php

use App\Http\Middleware\NumChecker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;

Route::get("/calculate", [TaxController::class, "passView"])->name("calculate");

Route::post("/calculate", [TaxController::class, "calculate"])->middleware([NumChecker::class])->name("calculate.cal");
