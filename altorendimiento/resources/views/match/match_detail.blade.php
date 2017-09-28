@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">

    <p> 
        <h2><strong>Equipo Rival:</strong> {{ $match->rival_team->name }} </h2>
        <h4><strong>Estadio:</strong> {{ $match->stadium->name }} </h4>
        <h4><strong>Torneo:</strong> {{ $match->tournament->name }} </h4>
        <h4><strong>Fecha de Partido:</strong> {{ $match->match_date }} </h4>
        <h4><strong>Local:</strong>  {{ $match->is_local == 1 ? 'Local' : 'Visitante' }} </h4>
        <h4><strong>Goles Local:</strong> {{ $match->is_local }} </h4>
        <h4><strong>Goles Visitante:</strong> {{ $match->is_local }} </h4>
        
    </p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Jugador</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <!-- <td><a class="btn btn-small btn-warning" href="{{ URL::to('players/create') }}">Crear</a></td> -->
            </tr>
        </thead>
        <tbody>
        @foreach($allPlayers as $key => $player)
            <tr>
                <td rowspan="2">{{ $player->name }}</td>

                <td>
                    <strong>Pases buenos: </strong>
                    {{ $player->good_pass ? $player->good_pass : '--'}}
                </td>

                <td>
                    <strong>Pases malos: </strong>
                    {{ $player->bad_pass ? $player->bad_pass : '--'}}
                </td>

                <td>
                    <strong>Pases cortos: </strong>
                    {{ $player->short_pass ? $player->short_pass : '--'}}
                </td>

                <td>
                    <strong>Pases medios: </strong>
                    {{ $player->medium_pass ? $player->medium_pass : '--'}}
                </td>

                <td>
                    <strong>Pases largos: </strong>
                    {{ $player->long_pass ? $player->long_pass : '--'}}
                </td>

                <td>
                    <strong>Borde interno: </strong>
                    {{ $player->internal_edge ? $player->internal_edge : '--'}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Borde externo: </strong>
                    {{ $player->external_edge ? $player->external_edge : '--'}}
                </td>

                <td>
                    <strong>Empeine: </strong>
                    {{ $player->instep ? $player->instep : '--'}}
                </td>

                <td>
                    <strong>Taco: </strong>
                    {{ $player->taco ? $player->taco : '--'}}
                </td>

                <td>
                    <strong>Muslo: </strong>
                    {{ $player->tigh ? $player->tigh : '--'}}
                </td>

                <td>
                    <strong>Pecho: </strong>
                    {{ $player->chest ? $player->chest : '--'}}
                </td>

                <td>
                    <strong>Cabeza: </strong>
                    {{ $player->head ? $player->head : '--'}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop