<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $agenda->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora') }}
            {{ Form::time('hora', $agenda->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lugar') }}
            {{ Form::text('lugar', $agenda->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
            {!! $errors->first('lugar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_pacientes') }}
            {{ Form::select('id_pacientes',$pacientes, $agenda->id_pacientes, ['class' => 'form-control' . ($errors->has('id_pacientes') ? ' is-invalid' : ''), 'placeholder' => 'Id Pacientes']) }}
            {!! $errors->first('id_pacientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::select('id_user',$user, $agenda->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>