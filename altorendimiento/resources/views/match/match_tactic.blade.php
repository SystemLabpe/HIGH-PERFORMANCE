@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
	<h2>Módulo Táctico</h2>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Equipo Rival: {{ $match->rival_team->name }} </h3>
		</div>		
	</div>
	<br>
	@include('layouts.errors')

	{!! Form::model($match, ['route' => ['matchs.createTactical', $match->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
		{!! Form::hidden('id', $match->id) !!}
		{!! Form::hidden('tournament_id', $match->tournament_id) !!}
		{!! Form::hidden('rival_team_id', $match->rival_team_id) !!}
		{!! Form::hidden('stadium_id', $match->stadium_id) !!}
		<div class="form-group">
		    {!!  Form::label('tactical', 'Táctica', ['class' => 'control-label col-md-4']) !!}
		    <div class="col-md-4">
		    	{!! Form::select('tactical_id', $tacticals->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Agregar Táctica', 'required' => '')) !!}
		    </div>
		    <div class="col-md-2">
		    	{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
		    </div>
		</div>
	{!! Form::close() !!}

	{!! Form::model($match, ['route' => ['matchs.updateTechnicalPhysical', $match->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

	{!! Form::hidden('id', $match->id) !!}
	{!! Form::hidden('tournament_id', $match->tournament_id) !!}
	{!! Form::hidden('rival_team_id', $match->rival_team_id) !!}
	{!! Form::hidden('stadium_id', $match->stadium_id) !!}

	{!! Form::close() !!}

</div>
@stop

	


