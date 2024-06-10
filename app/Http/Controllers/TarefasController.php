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

    public function show($id)
    {
        $tarefa = Tarefas::findOrFail($id);
        return response()->json($tarefa);
    }

    public function concluir($id)
    {
        $tarefa = Tarefas::findOrFail($id);
        $tarefa->conclusao = Carbon::now();
        $tarefa->save();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa concluída com sucesso!');
    }

    //Direciona para criar tarefas
    public function create()
    {
        // Recupera os setores do banco de dados
        $setores = Setores::all();
        $prioridades = Prioridades::all();
        // Defina uma nova instância de Tarefa ou qualquer lógica para criar uma nova tarefa
        $tarefa = new Tarefas();
        return view('tarefas.adicionar')->with(['setores' => $setores, 'prioridades' => $prioridades, 'tarefa' => $tarefa]);
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
            return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
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
            return redirect()->route('tarefas.index')->with('success', 'Tarefa Atualizada com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();
            $ex->getMessage();
            return redirect()->route('tarefas.index')->with('error', 'Erro ao Atualizar a tarefa.');
        }
    }

    //Exclui
    public function destroy(Request $request, $id)
    {
        try {
            tarefas::findOrFail($id)->delete();
            return redirect()->route('tarefas.index')->with('success', 'Tarefa Excluída com Sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('tarefas.index')->with('error', 'Erro ao excluir tarefas!');
        }
    }

    public function filtrar(Request $request)
    {
        // Query para selecionar tarefas com suas prioridades e setores
        $query = DB::table('tarefas as t')
            ->join('prioridades as p', 't.prioridade_id', '=', 'p.id')
            ->join('setores as s', 't.setor_id', '=', 's.id')
            ->select('t.*', 'p.nome as prioridade_nome', 's.nome as setor_nome')
            ->whereNull('t.conclusao');

        // Verifica se foi enviado um filtro por prioridade
        if ($request->has('ordenacao') && $request->ordenacao === 'prioridade') {
            // Aplica a ordenação por prioridade
            $query->orderBy('p.nome', 'asc');
        }
        // Verifica se foi enviado um filtro por data de término
        elseif ($request->has('ordenacao') && $request->ordenacao === 'data_termino_asc') {
            // Aplica a ordenação por data de término em ordem ascendente
            $query->orderBy('t.data_termino', 'asc');
        }

        // Executa a consulta
        $tarefas = $query->get();

        // Passando o indicador de filtro para a view
        $filtrado = true;

        return view('tarefas.index', compact('tarefas', 'filtrado'));
    }
}
