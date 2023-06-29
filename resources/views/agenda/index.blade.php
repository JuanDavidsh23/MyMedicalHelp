@extends('layouts.app')

@section('template_title')
    Agenda
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h3> {{ __('Agenda') }} </h3>
                            </span>
                            <div class="d-md-flex justify-content-md-end">
                                <form action="{{ route('Agenda.index') }}" method="GET" class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" name="busqueda" placeholder="buscador" class="form-control mr-2">
                                </form>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('Agenda.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if(Session::has('success'))
                    
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>
										<th>Pacientes</th>
										<th>Enfermera</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $agenda)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $agenda->fecha_inicio }}</td>
											<td>{{ $agenda->fecha_fin }}</td>
											<td>{{ $agenda->paciente->nombre }}</td>
											<td>{{ $agenda->usuario->name }}</td>

                                            <td>
                                                <form action="{{ route('Agenda.destroy',$agenda->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('Agenda.show',$agenda->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('Agenda.edit',$agenda->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $agendas->links() !!}
            </div>
        </div>
    </div>
@endsection