@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p> 
                <h2>Equipo Rival: {{ $match->rival_team->name }} </h2>
                <h4><strong>Estadio:</strong> {{ $match->stadium->name }} </h4>
                <h4><strong>Torneo:</strong> {{ $match->tournament->name }} </h4>
                <h4><strong>Fecha de Partido:</strong> {{ $match->match_date }} </h4>
                <h4><strong>Local:</strong>  {{ $match->is_local == 1 ? 'Local' : 'Visitante' }} </h4>
                <h4><strong>Goles Local:</strong> {{ $match->local_score }} </h4>
                <h4><strong>Goles Visitante:</strong> {{ $match->visitor_score }} </h4>
                
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Jugador</td>
                        <!-- <td><a class="btn btn-small btn-warning" href="{{ URL::to('players/create') }}">Crear</a></td> -->
                    </tr>
                </thead>
                <tbody>
                @foreach($allPlayers as $key => $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop