@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-12">
    <h2>Crear Jugador</h2>

	{!! Form::open(['route' => 'player.store']) !!}  

      @include('player.season_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop