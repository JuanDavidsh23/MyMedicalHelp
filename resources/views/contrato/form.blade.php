<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: green; 
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: .4s;
}

input:checked + .slider {
  background-color: orange;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

.switch .slider:after {
  content: "Activo";
  color: white;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  font-size: 12px;
  font-weight: bold;
  white-space: nowrap;
  text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black; /* Agregar bordes negros */
}

.switch .slider.inactivo:after {
  content: "Inactivo";
}
</style>


<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('idEps') }}
            {{ Form::select('idEps', $eps, $contrato->idEps, ['class' => 'form-control' . ($errors->has('idEps') ? ' is-invalid' : ''), 'placeholder' => 'Ideps']) }}
            {!! $errors->first('idEps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $contrato->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $contrato->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            <br>
            <label class="switch">
                {{ Form::hidden('estado', '0') }} <!-- Valor predeterminado para el estado inactivo -->
                {{ Form::checkbox('estado', '1', $contrato->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'id' => 'estado_checkbox']) }}
                <span class="slider"></span>
            </label>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
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

    document.getElementById('estado_checkbox').addEventListener('change', function() {
        const slider = document.querySelector('.slider');
        slider.classList.toggle('activo');
        slider.classList.toggle('inactivo');
    });
</script>
