@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-12">
    <h2>Crear Jugador</h2>

</div>


<!DOCTYPE html>
<html>
<head>
    <title>Alto Rendimiento</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <!-- <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('seasons') }}">Nerd Alert</a>
        </div> -->
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('players') }}">Jugadores</a></li>
            <li><a href="{{ URL::to('players/create') }}">Crear Jugador</a>
        </ul>
    </nav>

    <h1>Crear Jugador</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all() )}}

    {{ Form::open(array('url' => 'players')) }}
    
        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('height', 'Talla (m)') }}
            {{ Form::date('height', Input::old('height'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('weight', 'Peso (Kg)') }}
            {{ Form::date('weight', Input::old('weight'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('birth_date', 'Fecha de Nacimiento') }}
            {{ Form::date('birth_date', Input::old('birth_date'), array('class' => 'form-control')) }}
        </div>

    {{ Form::submit('Jugador Creado', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>