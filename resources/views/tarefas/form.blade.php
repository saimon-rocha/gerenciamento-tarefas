@csrf
<div class="flex flex-wrap">
    <div class="w-full my-4"></div>

    <div class="form-group w-full md:w-1/2 px-4 mb-4">
        {{ Form::label('titulo', 'Título', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
        {{ Form::text('titulo', null, ['class' => 'form-control border border-gray-300 rounded-md p-2 w-full', 'required']) }}
    </div>

    <div class="form-group w-full md:w-1/2 px-4 mb-4">
        {{ Form::label('descricao', 'Descrição', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
        {{ Form::text('descricao', null, ['class' => 'form-control border border-gray-300 rounded-md p-2 w-full', 'required']) }}
    </div>

    <div class="w-full my-4"></div>

    <div class="form-group w-full md:w-1/4 px-4 mb-4">
        {{ Form::label('prioridade', 'Prioridade', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
        {{ Form::select('prioridade', $prioridades->pluck('nome', 'id'), null, ['class' => 'form-control border border-gray-300 rounded-md p-2 w-full', 'required']) }}
    </div>

    <div class="form-group w-full md:w-1/4 px-4 mb-4">
        {{ Form::label('setor', 'Setor', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
        {{ Form::select('setor', $setores->pluck('nome', 'id'), null, ['class' => 'form-control border border-gray-300 rounded-md p-2 w-full', 'required']) }}
    </div>
    
    <div class="form-group w-full md:w-1/4 px-4 mb-4">
        {{ Form::label('data_termino', 'Data', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
        {{ Form::date('data_termino', \Carbon\Carbon::now(), ['class' => 'form-control border border-gray-300 rounded-md p-2 w-full', 'required']) }}
    </div>

    <div class="w-full my-4"></div>
    
    <div class="form-group w-full px-4 mb-4">
        {{ Form::submit('Salvar Alterações', ['class' => 'btn btn-primary bg-blue-500 text-white font-bold py-2 px-4 rounded']) }}
    </div>
</div>
