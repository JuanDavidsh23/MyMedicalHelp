<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('pacientes') }}
                {{ Form::select('pacientes_id', $pacientes, $historia->pacientes_id, ['class' => 'form-control' . ($errors->has('pacientes_id') ? ' is-invalid' : ''), 'placeholder' => 'Pacientes']) }}
                {!! $errors->first('pacientes_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('diagnostico') }}
                {{ Form::text('diagnostico', $historia->diagnostico, ['class' => 'form-control' . ($errors->has('diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico']) }}
                {!! $errors->first('diagnostico', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('signosvitales') }}
                {{ Form::text('signosvitales', $historia->signosvitales, ['class' => 'form-control' . ($errors->has('signosvitales') ? ' is-invalid' : ''), 'placeholder' => 'signosvitales']) }}
                {!! $errors->first('signosvitales', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('antecedentesalergicos') }}
                {{ Form::text('antecedentesalergicos', $historia->antecedentesalergicos, ['class' => 'form-control' . ($errors->has('antecedentesalergicos') ? ' is-invalid' : ''), 'placeholder' => 'antecedentesalergicos']) }}
                {!! $errors->first('antecedentesalergicos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('evolucion') }}
                {{ Form::text('evolucion', $historia->evolucion, ['class' => 'form-control' . ($errors->has('evolucion') ? ' is-invalid' : ''), 'placeholder' => 'Procedimientos']) }}
                {!! $errors->first('evolucion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('tratamiento') }}
                {{ Form::text('tratamiento', $historia->tratamiento, ['class' => 'form-control' . ($errors->has('tratamiento') ? ' is-invalid' : ''), 'placeholder' => 'Recomendaciones']) }}
                {!! $errors->first('tratamiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" style="background-color: #E74C3C; color: white; border-radius: 10px; border-color:#E74C3C; ">{{ __('Guardar') }}</button>
    </div>
</div>
