@csrf
<div class="row">
    <div class="w-100"></div>
    <br><br>
    
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
        {{ Form::label('titulo', 'Título', ['class' => 'control-label']) }}
        {{ Form::text('titulo', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-6">
        {{ Form::label('descricao', 'Descrição', ['class' => 'control-label']) }}
        {{ Form::text('descricao', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="w-100"></div>
    <br><br>

    <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
        {{ Form::label('prioridade', 'Prioridade', ['class' => 'control-label']) }}
        {{ Form::select('prioridade', ['baixo' => 'Baixo', 'medio' => 'Médio', 'alto' => 'Alto'], null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
        {{ Form::label('setor', 'Setor', ['class' => 'control-label']) }}
        {{ Form::select('setor', ['adm' => 'Administração', 'ti' => 'TI', 'desenvolvimento' => 'Desenvolvimento'], null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="w-100"></div>
    <br><br>
    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
        {{ Form::submit('Salvar Alterações', ['class' => 'btn btn-primary']) }}
    </div>
    <br><br>
</div>
