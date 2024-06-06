<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridades extends Model
{
    use HasFactory;

    // Nome da tabela correspondente no banco de dados
    protected $table = 'prioridades';

    protected $primaryKey = 'id';
}
