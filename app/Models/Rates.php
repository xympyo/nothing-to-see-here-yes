<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rates extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "rates";

    protected $fillable = [
        "income_from",
        "income_to",
        "percentage"
    ];
}
