<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carrito";
    protected $primaryKey = "idCar";

    protected $fillable = ["idUsu"];

    public function carritocoche()
    {
        return $this->hasMany(CarritoCoche::class);
    }

}
