@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <p> 
        <strong>Estadio:</strong> {{ $match->stadium->name }}  <br>
        <strong>Torneo:</strong> {{ $match->tournament->name }} <br>
        <strong>Equipo Rival:</strong> {{ $match->rival_team->name }} <br>
        <strong>Fecha de Partido:</strong> {{ $match->match_date }} <br>
        <strong>Local:</strong>  {{ $match->is_local == 1 ? 'Local' : 'Visitante' }} <br>
        <strong>Goles Local:</strong> {{ $match->is_local }} <br>
        <strong>Goles Visitante:</strong> {{ $match->is_local }} <br>
        
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
                    Pases buenos
                    {{ $player->good_pass }}
                </td>

                <td>
                    Pases malos
                    {{ $player->bad_pass }}
                </td>

                <td>
                    Pases cortos
                    {{ $player->short_pass }}
                </td>

                <td>
                    Pases medios
                    {{ $player->medium_pass }}
                </td>

                <td>
                    Pases largos
                    {{ $player->long_pass }}
                </td>

                <td>
                    Borde interno
                    {{ $player->internal_edge }}
                </td>
            </tr>
            <tr>
                <td>
                    Borde externo
                    {{ $player->external_edge }}
                </td>

                <td>
                    Empeine
                    {{ $player->instep }}
                </td>

                <td>
                    Taco
                    {{ $player->taco }}
                </td>

                <td>
                    Muslo
                    {{ $player->tigh }}
                </td>

                <td>
                    Pecho
                    {{ $player->chest }}
                </td>

                <td>
                    Cabeza
                    {{ $player->head }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop