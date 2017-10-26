@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <h2>Crear Partido</h2>
	@include('layouts.errors')
    {!! Form::open(['route' => 'matchs.store', 'class' => 'form-horizontal']) !!}
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
    			<div class="form-group">
				    {!!  Form::label('stadium', 'Estadio', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('stadium_id', $stadiums->pluck('name','id'), null, array('class' => 'form-control', 'placeholder' => 'Seleccione Estadio', 'required' => '')) !!}
				    </div>				    
				</div>

				<div class="form-group">
				    {!!  Form::label('tournament', 'Torneo', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('tournament_id', $tournaments->pluck('name','id'), null, array('class' => 'form-control', 'placeholder' => 'Seleccione Torneo', 'required' => '')) !!}
				    </div>				    
				</div>

				<div class="form-group">
				    {!!  Form::label('rival_team', 'Equipo Rival', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('rival_team_id', $rival_teams->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccione Rival', 'required' => '')) !!}
				    </div>				    
				</div>

				<div class="form-group">
				    {!! Form::label('match_date', 'Fecha de Partido', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::date('match_date', null, array('class' => 'form-control')) !!}
				    </div>				    
				</div>

				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
				    	<div class="radio">
							<label>
					    		{{ Form::radio('is_local', '1', false, array('required' => '')) }}Local
					    	</label>
					    </div>
					    <div class="radio">
							<label>
								{{ Form::radio('is_local', '0', false, array('required' => '')) }} Visitante
							</label>
						</div>
				    </div>
				</div>

				<div class="form-group">
				    {!! Form::label('local_score', 'Goles Local', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::number('local_score', null , array('class' => 'form-control')) !!}
				    </div>
				    
				</div>

				<div class="form-group">
				    {!! Form::label('visitor_score', 'Goles Visitante', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::number('visitor_score', null , array('class' => 'form-control')) !!}	
				    </div>				    
				</div>
		    </div>
		 </div>

		<div class="row">
    		<div class="col-md-6 col-md-offset-3">
				<h3>Jugadores</h3>

				<table class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <td>Jugador</td>
				            <td></td>
				        </tr>
				    </thead>
				    <tbody>
				    @foreach($allPlayers as $key => $player)
				        <tr>
				            {!! Form::hidden('allPlayers['.$key.'][id]', $player->id) !!}
				            <td>{{ $player->name }}</td>
				            <td> 
				                {!! Form::checkbox('allPlayers['.$key.'][is_checked]', true) !!}
				            </td>
				        </tr>
				    @endforeach
				    </tbody>
				</table>

		    	<div class="col-md-12 text-center">
		    		{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}  <br><br>
		        </div>
		    </div>
		</div>

    {!! Form::close() !!}
</div>
@stop