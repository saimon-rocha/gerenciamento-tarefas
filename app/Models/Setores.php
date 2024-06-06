<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setores extends Model
{
    use HasFactory;

    // Nome da tabela correspondente no banco de dados
    protected $table = 'setores';

    protected $primaryKey = 'id';
}
