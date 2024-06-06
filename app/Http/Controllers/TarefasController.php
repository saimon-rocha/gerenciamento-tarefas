<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prioridades;
use Livewire\FeedbackModal;
use App\Models\Setores;
use App\Models\Tarefas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

class TarefasController extends Controller
{
    //Página inicial - listagem
    public function index()
    {
        // Recupera as tarefas que não foram concluídas
        $tarefas = Tarefas::whereNull('conclusao')->get();
        return view('tarefas.index')->with('tarefas', $tarefas);
    }

    public function concluir($id)
    {
        $tarefa = Tarefas::findOrFail($id);
        $tarefa->conclusao = Carbon::now();
        $tarefa->save();
        return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa concluída com sucesso!');
    }

    //Direciona para criar tarefas
    public function create()
    {
        // Recupera os setores do banco de dados
        $setores = Setores::all();
        $prioridades = Prioridades::all();
        return view('tarefas.adicionar')->with(['setores' => $setores, 'prioridades' => $prioridades]);
    }

    //Cria
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $tarefa = new Tarefas();
            $tarefa->titulo        = $request->titulo;
            $tarefa->descricao     = $request->descricao;
            $tarefa->prioridade_id = $request->prioridade;
            $tarefa->setor_id      = $request->setor;
            $tarefa->data_termino  = $request->data_termino;
            $tarefa->data_criacao  = Carbon::now();
            $tarefa->save();
            DB::commit();

            return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa criada com sucesso!');
            $this->mostrarSucesso();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('tarefas.index')->with('error', 'Erro ao criar a tarefa.');
        }
    }

    //Edita
    public function edit($id)
    {
        $tarefas = Tarefas::findOrFail($id);
        $prioridades = Prioridades::all();
        $setores = Setores::all();
        return view('tarefas.editar', compact('tarefas', 'prioridades', 'setores'));
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        try {
            // Encontrar a tarefa a ser atualizada
            $tarefas = tarefas::findOrFail($id);
            DB::beginTransaction();

            // Atualiza os campos da tarefa
            $tarefas->titulo        = $request->titulo;
            $tarefas->descricao     = $request->descricao;
            $tarefas->prioridade_id = $request->prioridade;
            $tarefas->setor_id      = $request->setor;
            $tarefas->data_termino  = $request->data_termino;
            $tarefas->data_criacao  = Carbon::now();
            $tarefas->save();
            DB::commit();
            return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa atualizada com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('tarefas.index')->with('error', 'Erro ao atualizar a tarefa.');
        }
    }

    //Exclui
    public function destroy(Request $request, $id)
    {
        try {
            tarefas::findOrFail($id)->delete();
            return redirect()->route('tarefas.index')->with('sucesso', 'tarefas excluída com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('tarefas.index')->with('error', 'Erro ao excluir tarefas!');
        }
    }
}
