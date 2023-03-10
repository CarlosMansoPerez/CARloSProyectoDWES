<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $table = "coche";
    protected $primaryKey = "idCoc";

    protected $fillable = ["marca", "modelo", "precio", "fecha_matriculacion", "color", "foto", "logo"];

    public function accesorios(){
        return $this->hasMany('App\Models\Accesorio', 'idAcc', 'idCoc');
    }
}
