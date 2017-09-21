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
    </div>
</body>
</html>