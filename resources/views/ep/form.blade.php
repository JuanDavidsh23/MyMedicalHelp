<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            
            <div class="form-group col-md-6">
                {{ Form::label('eps') }}
                {{ Form::text('eps', $ep->eps, ['class' => 'form-control' . ($errors->has('eps') ? ' is-invalid' : ''), 'placeholder' => 'eps']) }}
                {!! $errors->first('eps', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('direccion') }}
                {{ Form::text('direccion', $ep->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'direccion']) }}
                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('telefonogeneral') }}
                {{ Form::number('telefonogeneral', $ep->telefonogeneral, ['class' => 'form-control' . ($errors->has('telefonogeneral') ? ' is-invalid' : ''), 'placeholder' => 'telefonogeneral']) }}
                {!! $errors->first('telefonogeneral', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('telefonoprincipal') }}
                {{ Form::number('telefonoprincipal', $ep->telefonoprincipal, ['class' => 'form-control' . ($errors->has('telefonoprincipal') ? ' is-invalid' : ''), 'placeholder' => 'Procedimientos']) }}
                {!! $errors->first('telefonoprincipal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
