<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $table = "coche";
    protected $primaryKey = "idCoc";
    public $timestamps = false;

    protected $fillable = ["idUsu", "marca", "modelo", "precio", "fecha_matriculacion", "color", "foto"];

    // public function accesorios(){
    //     return $this->hasMany('App\Models\Accesorio', 'idAcc', 'idCoc');
    // }
}
