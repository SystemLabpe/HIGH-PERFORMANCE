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

    <h1>Temporada {{ $season->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $season->name }}</h2>
        <p>
            <strong>Temporada:</strong> {{ $season->email }}<br>
            <strong>Fecha de Inicio:</strong> {{ $season->date_init }}
            <strong>Fecha de Termino:</strong> {{ $season->date_end }}
        </p>
    </div>

</div>
</body>
</html>