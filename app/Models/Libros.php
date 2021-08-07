<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    protected $table= 'libro';
    protected $fillable=["id-libro", "nombre","descripcion","categoria"];
    protected $primaryKey="id-libro";

    protected $hidden = [
        'create_add', 'update_at'
    ];
}
