@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Equipo Rival</td>
                <td>Torneo</td>
                <td>Goles Local</td>
                <td>Goles Visitante</td>
                <td><a class="btn btn-small btn-warning" href="{{ URL::to('matches/create') }}">Crear</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($matches as $key => $value)
            <tr>
                <td>{{ $value->rival_team->name }}</td>
                <td>{{ $value->tournament->name }}</td>
                <td>{{ $value->local_score }}</td>
                <td>{{ $value->visitor_score }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('matches/' . $value->id) }}">Detalle</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('matches/' . $value->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@stop