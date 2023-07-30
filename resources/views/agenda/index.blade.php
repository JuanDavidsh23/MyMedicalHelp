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
                        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

                            <span id="card_title">
                               <h3> {{ __('Agenda') }} </h3>
                            </span>
                            <div class="d-md-flex justify-content-md-end">
                                
                            </div>

                             <div class="float-right">
                                <a href="{{ route('Agenda.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva Agenda') }}
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
                            <table id="agenda_table" class="table table-striped table-hover">
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
                                                    <a class="btn btn-sm btn-warning" href="{{ route('Agenda.edit',$agenda->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/Spanish.json') }}"></script>

<script>
        $(document).ready(function () {
            $('#agenda_table').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                }
            });
        });
    </script>
@endsection