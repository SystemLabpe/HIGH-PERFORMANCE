<!-- app/views/nerds/index.blade.php -->

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
            <li><a href="{{ URL::to('seasons') }}">Temporadas</a></li>
            <li><a href="{{ URL::to('seasons/create') }}">Crear Temporada</a>
        </ul>
    </nav>

    <h1>Crear Temporada</h1>

    {!! Form::open(['route' => 'seasons.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Temporada') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('date_init', 'Fecha de Inicio') !!}
            {!! Form::date('date_init', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('date_end', 'Fecha de Termino') !!}
            {!! Form::date('date_end', null, array('class' => 'form-control')) !!}
        </div>

    {!! Form::submit('Temporada Creada', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

</div>
</body>
</html>