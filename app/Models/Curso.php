<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $guarded = ['id', 'status'];

    // protected $fillable = ['curso'];
}
