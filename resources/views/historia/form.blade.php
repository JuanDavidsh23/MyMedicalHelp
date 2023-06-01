<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $historia->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('procedimientos') }}
            {{ Form::text('procedimientos', $historia->procedimientos, ['class' => 'form-control' . ($errors->has('procedimientos') ? ' is-invalid' : ''), 'placeholder' => 'Procedimientos']) }}
            {!! $errors->first('procedimientos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recomendaciones') }}
            {{ Form::text('recomendaciones', $historia->recomendaciones, ['class' => 'form-control' . ($errors->has('recomendaciones') ? ' is-invalid' : ''), 'placeholder' => 'Recomendaciones']) }}
            {!! $errors->first('recomendaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pacientes') }}
            {{ Form::select('pacientes_id',$pacientes, $historia->pacientes_id, ['class' => 'form-control' . ($errors->has('pacientes_id') ? ' is-invalid' : ''), 'placeholder' => 'Pacientes']) }}
            {!! $errors->first('pacientes_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>