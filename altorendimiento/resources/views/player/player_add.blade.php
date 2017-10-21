@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Crear Jugador</h2>
	@include('layouts.errors')
	{!! Form::open(['route' => 'players.store', 'class' => 'form-horizontal']) !!}

      @include('player.player_form')

		<div class="col-md-12 text-center">
			{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}
		</div>
    {!! Form::close() !!}
</div>
@stop