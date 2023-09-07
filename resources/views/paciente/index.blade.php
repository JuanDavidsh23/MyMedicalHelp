@extends('layouts.app')

@section('template_title')
    Paciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

                            <span id="card_title">
                                <h3>{{ __('Paciente') }}</h3>
                            </span>

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="activos-tab" data-toggle="tab" href="#activos-pacientes" aria-controls="activos-pacientes" aria-selected="true">Activos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inactivos-tab" data-toggle="tab" href="#inactivos-pacientes" aria-controls="inactivos-pacientes" aria-selected="false">Inactivos</a>
                                </li>
                            </ul>

                            <div class="float-right">
                                <a href="{{ route('Paciente.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Paciente') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="activos-pacientes" aria-labelledby="activos-tab">
                            <table id="table_paciente" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Documento</th>
										<th>Eps</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pacientes->where('estado', 0) as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->nombre }}</td>
											<td>{{ $paciente->correo }}</td>
											<td>{{ $paciente->telefono }}</td>
											<td>{{ $paciente->documento }}</td>
											<td>
                                                {{ $paciente->contrato && $paciente->contrato->eps ? $paciente->contrato->eps->eps : 'No asignado' }}
                                            </td>



                                            <td>
                                                <form action="{{ route('Paciente.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('Paciente.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('Paciente.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                            </div>
                            <div class="tab-pane fade" id="inactivos-pacientes" aria-labelledby="inactivos-tab">
                            <table id="table_paciente" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Documento</th>
										<th>Eps</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pacientes->where('estado', 1) as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->nombre }}</td>
											<td>{{ $paciente->apellido }}</td>
											<td>{{ $paciente->correo }}</td>
											<td>{{ $paciente->telefono }}</td>
											<td>{{ $paciente->documento }}</td>
											<td>
                                                {{ $paciente->contrato && $paciente->contrato->eps ? $paciente->contrato->eps->eps : 'No asignado' }}
                                            </td>



                                            <td>
                                                <form action="{{ route('Paciente.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('Paciente.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('Paciente.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                            </div>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>

    <!-- Agrega estos scripts al final del body del layout principal -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/Spanish.json') }}"></script>

    <script>
        $(document).ready(function () {
            $('#table_paciente').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                }
            });
        });
    </script>

@endsection
