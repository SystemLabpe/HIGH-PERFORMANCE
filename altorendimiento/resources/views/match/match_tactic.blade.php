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
		    	{!! Form::select('tactical_id', $tacticals->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccionar Táctica', 'required' => '')) !!}
		    </div>
		</div>
		<div class="form-group">
			{!!  Form::label('is_own', 'Es propia', ['class' => 'control-label col-md-4']) !!}
			<div class="col-md-1">
				{!! Form::checkbox('is_own', 1) !!}
			</div>
		</div>
		<div class="form-group">
			{!!  Form::label('ended_in_goal', 'Culminó en gol', ['class' => 'control-label col-md-4']) !!}
			<div class="col-md-1">
				{!! Form::checkbox('ended_in_goal', 1) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
    		{!! Form::submit('Agregar', array('class' => 'btn btn-primary')) !!}  <br><br>
        </div>		
	{!! Form::close() !!}

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Tácticas</h3>

			<table class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <td>Táctica</td>
			            <td>Es propia</td>
			            <td>Culminó en gol</td>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($match->tacticals as $key => $tactical)
			    	<tr>
			    		<td>{{ $tactical->name }}</td>
			    		<td>{{ $tactical->pivot->is_own == 1 ? 'Sí' : 'No' }}</td>
			    		<td>{{ $tactical->pivot->ended_in_goal == 1 ? 'Sí' : 'No' }}</td>
			    	</tr>
			    	@endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop

	


