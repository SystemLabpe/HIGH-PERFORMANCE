@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Crear Equipo Rival</h2>
    @include('layouts.errors')
    {!! Form::open(['route' => 'rival_teams.store', 'class' => 'form-horizontal']) !!}

        @include('rival_team.rival_team_form')

    	<div class="col-md-12 text-center">
    		{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}    	
        </div>

    {!! Form::close() !!}
</div>
@stop