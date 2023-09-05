@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center">My medical help</h3>
                        <hr style="border-top: px solid #000;">
                        <link rel="stylesheet" href="{{ asset('dist/css/style2.css') }}" >
                         <div class="row mt-4">
<div class="col-md-4">
    <div class="card">
        <div class="card-body" style="background-color: #E74C3C; color: white; border-radius: 10px;">
            <h4 class="card-title">Enfermeros Registrados</h4>
            <h4 class="card-text">{{ $totalUsers }}</h4>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-body" style="background-color: #E74C3C; color: white; border-radius: 10px;">
            <h4 class="card-title">Pacientes Registrados</h4>
            <h4 class="card-text">{{ $totalPacientes }}</h4>
        </div>
    </div>
</div>

    
<div class="col-md-4">
    <div class="card">
        <div class="card-body" style="background-color: #E74C3C; color: white; border-radius: 10px;">
            <h4 class="card-title">Contratos</h4>
            <h4 class="card-text">{{ $totalContratos }}</h4>
        </div>
    </div>
</div>
<h3>¿Qué Somos?</h3>
    <div class="divi">
        
            <p>La empresa de My Medical Help se encarga de gestionar el proceso tercerización de servicios de enfermeras de atención en el hogar, ellos cuentan con un grupo de enfermeras de My Medical Help, las enfermeras son asignadas a un paciente el cual cuenta con una historia clínica y cuidados.</p>
        <div class="img-logo">
    <img class="img" alt="centered " src='img/corazon.png' width="300px" height="200px" >
</div>

    </div>
  


                    </div>
                  
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
