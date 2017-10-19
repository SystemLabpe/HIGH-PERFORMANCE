@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-10 col-md-offset-1">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td class="col-md-4">Equipo Rival</td>
                <td class="col-md-2">Torneo</td>
                <td class="col-md-1">Goles Local</td>
                <td class="col-md-1">Goles Visitante</td>
                <td class="col-md-2"><a class="btn btn-small btn-warning" href="{{ URL::to('matchs/create') }}">Crear</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($matchs as $key => $value)
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
                    <a class="btn btn-small btn-success" href="{{ URL::to('matchs/' . $value->id) }}">Detalle</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('matchs/' . $value->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $matchs->links() !!}

</div>
@stop