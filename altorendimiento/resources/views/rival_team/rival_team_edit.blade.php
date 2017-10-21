@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-12">
    <h2>Editar Equipo Rival {{ $rival_team->name }}</h2>
    @include('layouts.errors')
    {!! Form::model($rival_team, ['route' => ['rival_teams.update', $rival_team->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('rival_team.rival_team_form')

    	<div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop