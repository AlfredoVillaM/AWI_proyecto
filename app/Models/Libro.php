<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Prestamo;

class Libro extends Model
{
    use SoftDeletes;

    public function prestamos() {
        return $this->hasMany(Prestamo::class);
    }

    public function resenas() {
        return $this->hasMany(Resena::class);
    }
}
