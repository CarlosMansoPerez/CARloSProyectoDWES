<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoCoche extends Model
{
    use HasFactory;

    protected $table = "carritocoche";
    protected $primaryKey = "id";

    protected $fillable = ["idCar", "idCoc", "cantidad"];
}
