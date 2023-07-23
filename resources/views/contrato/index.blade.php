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
                            <span id="card_title">
                                <h3>{{ __('Contrato') }}</h3>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('Contrato.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Ideps</th>
                                        <th>Fecha Inicio Contrato</th>
                                        <th>Fecha Fin Contrato</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $contrato->ep->eps }}</td>
                                            <td>{{ $contrato->fecha_inicio }}</td>
                                            <td>{{ $contrato->fecha_fin }}</td>
                                            <td>
                                                @if ($contrato->estado == 0)
                                                    <button class="btn btn-success btn-sm">Activo</button>
                                                @else
                                                    <button class="btn btn-warning btn-sm">Inactivo</button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('Contrato.destroy', $contrato->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('Contrato.edit', $contrato->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $contratos->links() !!}
            </div>
        </div>
    </div>
@endsection
