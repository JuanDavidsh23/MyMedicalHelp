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
        <div class="card-body" style="background-color: #007BFF; color: white; border-radius: 10px;">
            <h4 class="card-title">Enfermeros Registrados</h4>
            <h4 class="card-text">{{ $totalUsers }}</h4>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-body" style="background-color: #007BFF; color: white; border-radius: 10px;">
            <h4 class="card-title">Pacientes Registrados</h4>
            <h4 class="card-text">{{ $totalPacientes }}</h4>
        </div>
    </div>
</div>

    
<div class="col-md-4">
    <div class="card">
        <div class="card-body" style="background-color: #007BFF; color: white; border-radius: 10px;">
            <h4 class="card-title">Contratos</h4>
            <h4 class="card-text">{{ $totalContratos }}</h4>
        </div>
    </div>
</div>
<h3>¿Qué Somos?</h3>
    <div class="divi">
        
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
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
