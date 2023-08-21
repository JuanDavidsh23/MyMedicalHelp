

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('Nro_Contrato') }}
                {{ Form::number('Nro_Contrato', $contrato->Nro_Contrato, ['class' => 'form-control' . ($errors->has('Nro_Contrato') ? ' is-invalid' : ''), 'placeholder' => 'Nro.Contrato']) }}
                {!! $errors->first('Nro_Contrato', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('Eps') }}
                {{ Form::select('idEps', $eps, $contrato->idEps, ['class' => 'form-control' . ($errors->has('idEps') ? ' is-invalid' : ''), 'placeholder' => 'Eps']) }}
                {!! $errors->first('idEps', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('fecha_inicio') }}
                {{ Form::date('fecha_inicio', $contrato->fecha_inicio, ['id' => 'fecha_inicio', 'class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
                {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('fecha_fin') }}
                {{ Form::date('fecha_fin', $contrato->fecha_fin, ['id' => 'fecha_fin', 'class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
                {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
            </div>
                <br>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
<script>
  document.getElementById('fecha_inicio').onchange = function() {
    document.getElementById('fecha_fin').min = this.value;
};
</script>

