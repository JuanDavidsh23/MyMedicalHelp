<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idEps') }}
            {{ Form::select('idEps',$eps, $contrato->idEps, ['class' => 'form-control' . ($errors->has('idEps') ? ' is-invalid' : ''), 'placeholder' => 'Ideps']) }}
            {!! $errors->first('idEps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', $contrato->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('politicas') }}
            {{ Form::text('politicas', $contrato->politicas, ['class' => 'form-control' . ($errors->has('politicas') ? ' is-invalid' : ''), 'placeholder' => 'Politicas']) }}
            {!! $errors->first('politicas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>