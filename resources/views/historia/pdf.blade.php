$<!doctype html>
<html lang="en">

<head>
  <title>Contratos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    .thead{
        background-color: black;
        color: white;
    }
    .btn{
        background-color: green;
    }
</style>
<body>
    <h1 class="text-center">Contrato</h1>
<table id="contrato_table_activos" class="table" style="text-align: center; font-size; 20px">
<thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Diagnóstico</th>
										<th>Signos Vitales</th>
										<th>Antecedentes</th>
										<th>Evolución</th>
										<th>Tratamiento</th>
										<th>Paciente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historias as $historia)
                                        <tr>
                                            <td>{{ $historia->id }}</td>
                                            
											<td>{{ $historia->diagnostico }}</td>
											<td>{{ $historia->signosvitales }}</td>
											<td>{{ $historia->antecedentesalergicos }}</td>
											<td>{{ $historia->evolucion }}</td>
											<td>{{ $historia->tratamiento }}</td>
											<td>{{ $historia->paciente->nombre }}</td>

                                            <td>
                                                <form action="{{ route('Historia.destroy',$historia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('Historia.show',$historia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('Historia.edit',$historia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                    </table>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>