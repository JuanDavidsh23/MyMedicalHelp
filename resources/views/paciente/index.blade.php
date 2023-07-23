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

                            <span id="card_title">
                                <h3>{{ __('Paciente') }}</h3>
                            </span>
                            <div class="d-md-flex justify-content-md-end">
                                <form action="{{ route('Paciente.index') }}" method="GET" class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" name="busqueda" placeholder="Buscador" class="form-control mr-2">
                                </form>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('Paciente.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo') }}
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
                        <div class="table-responsive">
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
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->nombre }}</td>
											<td>{{ $paciente->apellido }}</td>
											<td>{{ $paciente->correo }}</td>
											<td>{{ $paciente->telefono }}</td>
											<td>{{ $paciente->documento }}</td>
											<td>{{ $paciente->ep->eps }}</td>

                                            <td>
                                                <form action="{{ route('Paciente.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('Paciente.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('Paciente.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(()=>{
            new DataTable('#table_paciente');
        })
        
    </script>
@endsection