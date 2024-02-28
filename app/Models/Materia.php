<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    // Nome da tabela correspondente no banco de dados
    protected $table = 'materias';

    protected $primaryKey = 'id';

    // Campos que podem ser preenchidos em massa
    protected $lista = ['titulo', 'descricao', 'imagem', 'data_de_publicacao', 'texto_completo'];
}