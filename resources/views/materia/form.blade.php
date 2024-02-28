@csrf
<div class="row">

    <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
        {{ Form::label('titulo', 'Titulo', ['class' => 'control-label']) }}
        {{ Form::text('titulo', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
        {{ Form::label('descricao', 'Descricao', ['class' => 'control-label']) }}
        {{ Form::textarea('descricao', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
        {{ Form::label('texto_completo', 'Texto', ['class' => 'control-label']) }}
        {{ Form::textarea('texto_completo', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" id="imagem" name="imagem" class="from-control-file">
    </div>

    <div class="w-100"></div>
    <br><br>
    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
        {{ Form::submit('Salvar Alterações', ['class' => 'btn btn-primary']) }}
    </div>
    <br><br>
</div>
