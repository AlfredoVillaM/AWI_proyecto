<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Libro;
use App\Models\User;

class Prestamo extends Model
{
    use SoftDeletes;

    public function libro() {
        return $this->belongsTo(Libro::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
