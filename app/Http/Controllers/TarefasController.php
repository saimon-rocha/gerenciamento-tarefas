<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TarefasController extends Controller
{
    //Página inicial - listagem
    public function index()
    {
        // $tarefas = Tarefas::orderBy('id')->paginate(2);
        return view('tarefas.index');
    }

    public function show($id)
    {
    }
    
    //Direciona para criar tarefas
    public function create()
    {
        return view('tarefas.adicionar');
    }

    //Cria
    public function store(Request $request)
    {
        // try {
        //     DB::beginTransaction();
        //     $materia = new Materia();
        //     $materia->titulo             = $request->titulo;
        //     $materia->descricao          = $request->descricao;
        //     $materia->texto_completo     = $request->texto_completo;
        //     $materia->data_de_publicacao = now(); //Data atual

        //     // Verifica se uma nova imagem foi enviada
        //     if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        //         // Move a imagem para a pasta public/img e salva o caminho no banco de dados
        //         $caminhoImagem = $request->imagem->store('public/img');
        //         // Remove "public/" do início do caminho para armazenar no banco de dados
        //         $caminhoImagem = str_replace('public/', '', $caminhoImagem);
        //         $materia->imagem = $caminhoImagem;
        //     }

        //     $materia->save();
        //     DB::commit();

        //     return redirect()->route('materia.index')->with('sucesso', 'Matéria criada com sucesso!');
        // } catch (\Exception $ex) {
        //     DB::rollBack();
        //     return redirect()->route('materia.index')->with('error', 'Erro ao criar a matéria.');
        // }
    }


    //Edita
    public function edit($id)
    {
        // $materia = Materia::findOrFail($id);
        // return view('materia.editar')->with('materia', $materia);
    }

    //Atualizar
    public function update(Request $request, $id)
    {
        // try {
        //     // Encontrar a matéria a ser atualizada
        //     $materia = Materia::findOrFail($id);
        //     DB::beginTransaction();

        //     // Atualiza os campos da matéria, exceto a imagem
        //     $materia->titulo             = $request->titulo;
        //     $materia->descricao          = $request->descricao;
        //     $materia->texto_completo     = $request->texto_completo;
        //     $materia->data_de_publicacao = now(); //Data atual

        //     // Verifica se uma nova imagem foi enviada
        //     if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        //         // Move a imagem para a pasta public/img e salva o caminho no banco de dados
        //         $caminhoImagem = $request->imagem->store('public/img');
        //         // Remove "public/" do início do caminho para armazenar no banco de dados
        //         $caminhoImagem = str_replace('public/', '', $caminhoImagem);
        //         $materia->imagem = $caminhoImagem;
        //     }

        //     $materia->save();
        //     DB::commit();
        //     return redirect()->route('materia.index')->with('sucesso', 'Matéria atualizada com sucesso!');
        // } catch (\Exception $ex) {
        //     DB::rollBack();
        //     return redirect()->route('materia.index')->with('error', 'Erro ao atualizar a matéria.');
        // }
    }

    //Exclui
    public function destroy(Request $request, $id)
    {
        // try {
        //     Materia::findOrFail($id)->delete();
        //     return redirect()->route('materia.index')->with('sucesso', 'Materia excluída com sucesso!');
        // } catch (\Exception $ex) {
        //     DB::rollBack();
        //     return redirect()->route('materia.index')->with('error', 'Erro ao excluir materia!');
        // }
    }
}
