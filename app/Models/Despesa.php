<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $table = 'despesa';
    protected $fillable = ['idCarteira', 'nome', 'valor'];
    use HasFactory;
}
