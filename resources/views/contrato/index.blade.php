@extends('layouts.app')

@section('template_title')
    Contrato
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
                                <h3>{{ __('Contrato') }}</h3>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('Contrato.create') }}" class="btn btn-success btn-sm float-right" data-placement="left">
                                    {{ __('Nuevo contrato') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " id="activos-tab" data-toggle="tab" href="#activos" aria-controls="activos" aria-selected="true">Activos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="inactivos-tab" data-toggle="tab" href="#inactivos" aria-controls="inactivos" aria-selected="false">Inactivos</a>
                        </li>
                    </ul>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="activos" aria-labelledby="activos-tab">
                                <div class="table-responsive">
                                    <table id="contrato_table_activos" class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                <th>Nro.Contrato</th>
                                                <th>Eps</th>
                                                <th>Fecha Inicio Contrato</th>
                                                <th>Fecha Fin Contrato</th>
                                                <th>Estado</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contratos->where('estado', 0) as $contrato)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $contrato->Nro_Contrato }}</td>
                                                    <td>{{ $contrato->ep->eps }}</td>
                                                    <td>{{ $contrato->fecha_inicio }}</td>
                                                    <td>{{ $contrato->fecha_fin }}</td>
                                                    <td>
                                                        @if ($contrato->estado == 0)
                                                            <form action="{{ route('Contrato.toggleEstado', $contrato->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cancelModal{{ $contrato->id }}">Activo</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="cancelModal{{ $contrato->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel{{ $contrato->id }}" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="cancelModalLabel{{ $contrato->id }}">Cancelar Contrato</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('Contrato.toggleEstado', $contrato->id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="form-group">
                                                                                        <label for="razon_cancelacion">Razón de la Cancelación</label>
                                                                                        <textarea class="form-control" id="reason" name="razon_cancelacion" rows="3" required></textarea>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-danger">Confirmar Cancelación</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($contrato->estado == 0)
                                                            <a class="btn btn-sm btn-warning" href="{{ route('Contrato.edit', $contrato->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="inactivos" aria-labelledby="inactivos-tab">
                                <div class="table-responsive">
                                    <table id="contrato_table_inactivos" class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                <th>Nro.Contrato</th>
                                                <th>Eps</th>
                                                <th>Fecha Inicio Contrato</th>
                                                <th>Fecha Fin Contrato</th>
                                                <th>Estado</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contratos->where('estado', 1) as $contrato)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $contrato->Nro_Contrato }}</td>
                                                    <td>{{ $contrato->ep->eps }}</td>
                                                    <td>{{ $contrato->fecha_inicio }}</td>
                                                    <td>{{ $contrato->fecha_fin }}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#reasonModal{{ $contrato->id }}">Inactivo</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="reasonModal{{ $contrato->id }}" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel{{ $contrato->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="reasonModalLabel{{ $contrato->id }}">Razón de la Cancelación</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>{{ $contrato->razon_cancelacion }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Opcional: Puedes agregar aquí botones para editar contratos inactivos -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $contratos->links() !!}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/Spanish.json') }}"></script>
    <script>
        $(document).ready(function () {
            $('#contrato_table_activos').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                }
            });

            $('#contrato_table_inactivos').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                }
            });

            // Cambio de pestañas
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href"); // ID del contenido de la pestaña
                if (target === "#activos") {
                    $('#contrato_table_activos').DataTable().ajax.reload();
                } else if (target === "#inactivos") {
                    $('#contrato_table_inactivos').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection
