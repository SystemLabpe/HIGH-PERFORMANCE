@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-12">
    <h2>Editar Jugador</h2>
    {!! Form::model($player, ['route' => ['players.update', $player->id], 'method' => 'PUT']) !!}

        @include('player.player_form')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop