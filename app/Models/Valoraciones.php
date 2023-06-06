<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoraciones extends Model
{
    use HasFactory;

    protected $table = "valoraciones";
    protected $primaryKey = "idVal";

    protected $fillable = ["idCoc", "idUsu", "puntuacion", "comentario"];
}
