@extends('layouts.app')

@section('template_title')
    Historia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Historia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Historia.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $historia->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Procedimientos:</strong>
                            {{ $historia->procedimientos }}
                        </div>
                        <div class="form-group">
                            <strong>Recomendaciones:</strong>
                            {{ $historia->recomendaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Pacientes Id:</strong>
                            {{ $historia->paciente->nombre }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
