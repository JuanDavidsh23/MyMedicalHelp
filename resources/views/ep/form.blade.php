<!DOCTYPE html>
<html>
<head>
    <title>Formulario con formato numérico</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="eps">Nombre Eps</label>
                    <input type="text" name="eps" id="eps" class="form-control number-format" placeholder="Nombre">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control number-format" placeholder="Direccion">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonogeneral">Telefono general</label>
                    <input type="text" name="telefonogeneral" id="telefonogeneral" class="form-control number-format" placeholder="Telefono general">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoprincipal">Telefono principal</label>
                    <input type="text" name="telefonoprincipal" id="telefonoprincipal" class="form-control number-format" placeholder="Telefono principal">
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>


</body>
</html>
