<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    protected $table = 'carteira';
    protected $fillable = ['idUsuario', 'nomeUsuario', 'saldo'];
    use HasFactory;
}
