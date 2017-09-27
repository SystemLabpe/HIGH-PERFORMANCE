@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-12">
    <p>
        <strong>Temporada:</strong> {{ $tournament->name }}<br>
        <strong>Fecha de Inicio:</strong> {{ $tournament->date_init }}
        <strong>Fecha de Termino:</strong> {{ $tournament->date_end }}
    </p>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Jugador</td>
            <td>#</td>
            <td>Talla(m)</td>
            <td>Peso(kg)</td>            
            <!-- <td><a class="btn btn-small btn-warning" href="{{ URL::to('players/create') }}">Crear</a></td> -->
        </tr>
    </thead>
    <tbody>
    @foreach($allPlayers as $key => $player)
        <tr>
        	{!! Form::hidden('allPlayers['.$key.'][id]', $player->id) !!}

            <td>{{ $player->name }}</td>

			<td>{{ $player->player_number }}</td>

			<td>{{ $player->height }}</td>

			<td>{{ $player->weight }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop