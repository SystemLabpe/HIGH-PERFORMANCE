@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Jugador</h2>
    {!! Form::model($player, ['route' => ['players.update', $player->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('player.player_form')

        <div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop