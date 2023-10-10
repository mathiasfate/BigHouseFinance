<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';
    protected $fillable = ['idCarteira', 'nome', 'valor'];
    use HasFactory;
}
