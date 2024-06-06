<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
  use HasFactory;

  // Nome da tabela correspondente no banco de dados
  protected $table = 'tarefas';

  protected $primaryKey = 'id';

  protected $fillable = ['titulo', 'descricao', 'prioridade_id', 'setor_id', 'data_termino', 'data_criacao', 'conclusao'];
  

  // Define o relacionamento com a prioridade
  public function prioridade()
  {
    return $this->belongsTo(Prioridades::class, 'prioridade_id');
  }

  // Define o relacionamento com o setor
  public function setor()
  {
    return $this->belongsTo(Setores::class, 'setor_id');
  }
}
