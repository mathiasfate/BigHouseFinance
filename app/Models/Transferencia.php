<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    protected $table = 'transferencia';
    protected $fillable = ['idRemetente', 'idDestinatario', 'dataTransferencia', 'valor'];
    use HasFactory;
}
