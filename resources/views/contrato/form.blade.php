<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('idEps') }}
            {{ Form::select('idEps',$eps, $contrato->idEps, ['class' => 'form-control' . ($errors->has('idEps') ? ' is-invalid' : ''), 'placeholder' => 'Ideps']) }}
            {!! $errors->first('idEps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', number_format($contrato->costo, 0, ',', '.'), ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-check">
            {{ Form::checkbox('terminos_condiciones', 'si', false, ['class' => 'form-check-input', 'id' => 'terminos_condiciones_checkbox']) }}
            {{ Form::label('terminos_condiciones_checkbox', 'Acepto los términos y condiciones', ['class' => 'form-check-label']) }}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button id="submitButton" type="submit" class="btn btn-primary" disabled>{{ __('Enviar') }}</button>
    </div>
</div>

<script>
    document.getElementById('terminos_condiciones_checkbox').addEventListener('click', function() {
        if (this.checked) {
            if (confirm('¿Estás seguro?')) {
                console.log('Confirmado');
                document.getElementById('submitButton').disabled = false;
            } else {
                this.checked = false;
            }
        } else {
            document.getElementById('submitButton').disabled = true;
        }
    });
</script>
