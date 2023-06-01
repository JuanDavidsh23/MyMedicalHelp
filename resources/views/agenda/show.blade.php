@extends('layouts.app')

@section('template_title')
    {{ $agenda->name ?? "{{ __('Show') Agenda" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Agenda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Agenda.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $agenda->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $agenda->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar:</strong>
                            {{ $agenda->lugar }}
                        </div>
                        <div class="form-group">
                            <strong>Id Pacientes:</strong>
                            {{ $agenda->id_pacientes }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $agenda->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
