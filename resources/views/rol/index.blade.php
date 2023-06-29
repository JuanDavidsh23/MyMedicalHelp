@extends('layouts.app')

@section('template_title')
    Rol
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h3>{{ __('Roles') }}</h3>
                            </span>

                            <div class="d-md-flex justify-content-md-end">
                                <form action="{{ route('Rol.index') }}" method="GET" class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" name="busqueda" placeholder="buscador" class="form-control mr-2">
                                </form>
                            </div>

                            <div class="float-right">
                                <a href="{{ route('Rol.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th>Nombre Rol</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rols as $rol)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $rol->nombre_rol }}</td>
                                            <td>
                                                <form action="{{ route('Rol.destroy',$rol->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('Rol.show',$rol->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('Rol.edit',$rol->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rols->links() !!}
            </div>
        </div>
    </div>
@endsection