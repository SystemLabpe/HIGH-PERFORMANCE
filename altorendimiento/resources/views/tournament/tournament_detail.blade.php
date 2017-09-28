@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <p>
        <h2>Torneo:  {{ $tournament->name }}</h2>
        <h4><strong>Fecha de Inicio:</strong> {{ $tournament->date_init }}</h4> 
        <h4><strong>Fecha de Termino:</strong> {{ $tournament->date_end }}</h4> 
    </p>

    <div class="row">
        <div class="col-md-10">
            <h3>Jugadores</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td class="col-md-7">Jugador</td>
                        <td class="col-md-1">#</td>
                        <td class="col-md-2">Talla(m)</td>
                        <td class="col-md-2">Peso(kg)</td>            
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
    </div>    
</div>
@stop