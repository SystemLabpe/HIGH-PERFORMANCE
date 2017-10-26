@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <h2>Editar Partido</h2>
	@include('layouts.errors')
    {!! Form::model($match, ['route' => ['matchs.update', $match->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">

		        <div class="form-group">
				    {!!  Form::label('stadium', 'Estadio', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('stadium_id', $stadiums->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccione Estadio', 'required' => '')) !!}
				    </div>
				</div>

				<div class="form-group">
				    {!!  Form::label('tournament', 'Torneo', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('tournament_id', $tournaments->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccione Torneo', 'required' => '')) !!}
				    </div>
				</div>

				<div class="form-group">
				    {!!  Form::label('rival_team', 'Equipo Rival', ['class' => 'control-label col-md-4']) !!}
				    <div class="col-md-4">
				    	{!! Form::select('rival_team_id', $rival_teams->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccione Torneo', 'required' => '')) !!}
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
		 	<div class="col-md-6 text-right">
		 		<a class="btn btn-info" href="{{ URL::to('matchs/'.$match->id.'/editTechnicalPhysical') }}">Módulo Técnico y Físico</a>
		 	</div>
			<div class="col-md-6 text-left">
		 		<a class="btn btn-success"  href="{{ URL::to('matchs/'.$match->id.'/editTactical')>Módulo Táctico</a>
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
				                {!! Form::checkbox('allPlayers['.$key.'][is_checked]', true, $player->is_checked ? 1 : 0) !!}
				            </td>
				        </tr>
				    @endforeach
				    </tbody>
				</table>

			</div>
		</div>

		<!-- @foreach($allPlayers as $key => $player)
		<div class="panel panel-default">
		{!! Form::hidden('allPlayers['.$key.'][id]', $player->id) !!}
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $player->name }}</h3>
		  </div>
		  <div class="panel-body">
		    <h4><strong>Físico</strong></h4>
		    <table class="table">
		    	<tr>
		    		<td>
		                Pases buenos
		                {!! Form::number('allPlayers['.$key.'][good_pass]', $player->good_pass, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Pases malos
		                {!! Form::number('allPlayers['.$key.'][bad_pass]', $player->bad_pass, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Pases cortos
		                {!! Form::number('allPlayers['.$key.'][short_pass]', $player->short_pass, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Pases medios
		                {!! Form::number('allPlayers['.$key.'][medium_pass]', $player->medium_pass, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Pases largos
		                {!! Form::number('allPlayers['.$key.'][long_pass]', $player->long_pass, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Borde interno
		                {!! Form::number('allPlayers['.$key.'][internal_edge]', $player->internal_edge, array('class' => 'form-control')) !!}
		            </td>
		    	</tr>
		    	<tr>
		    		<td>
		                Borde externo
		                {!! Form::number('allPlayers['.$key.'][external_edge]', $player->external_edge, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Empeine
		                {!! Form::number('allPlayers['.$key.'][instep]', $player->instep, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Taco
		                {!! Form::number('allPlayers['.$key.'][taco]', $player->taco, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Muslo
		                {!! Form::number('allPlayers['.$key.'][tigh]', $player->tigh, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Pecho
		                {!! Form::number('allPlayers['.$key.'][chest]', $player->chest, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Cabeza
		                {!! Form::number('allPlayers['.$key.'][head]', $player->head, array('class' => 'form-control')) !!}
		            </td>
		    	</tr>
		    </table>
		    <h4><strong>Técnico</strong></h4>
		    <table class="table">
		    	<tr>
		    		<td colspan="4" class="text-center"><strong>Distancia</strong></td>
		    	</tr>
		    	<tr>
		    		<td>
		                Corta
		                {!! Form::number('allPlayers['.$key.'][d_short_distance]', $player->d_short_distance, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Media
		                {!! Form::number('allPlayers['.$key.'][d_medium_distance]', $player->d_medium_distance, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Larga
		                {!! Form::number('allPlayers['.$key.'][d_long_distance]', $player->d_long_distance, array('class' => 'form-control')) !!}
		            </td>
		            <td> </td>
		    	</tr>
		    	<tr></tr>
		    	<tr>
		    		<td colspan="4" class="text-center"><strong>Intensidad</strong></td>
		    	</tr>
		    	<tr>
		    		<td>
		                Velocidad
		                {!! Form::number('allPlayers['.$key.'][i_full_speed]', $player->i_full_speed, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                3/4 de velocidad
		                {!! Form::number('allPlayers['.$key.'][i_semi_full_speed]', $player->i_semi_full_speed, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                1/2 velocidad(trote)
		                {!! Form::number('allPlayers['.$key.'][i_half_speed]', $player->i_half_speed, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Caminar
		                {!! Form::number('allPlayers['.$key.'][i_walk]', $player->i_walk, array('class' => 'form-control')) !!}
		            </td>
		    	</tr>
		    	<tr></tr>
		    	<tr>
		    		<td colspan="4" class="text-center"><strong>Esfuerzo</strong></td>
		    	</tr>
		    	<tr>
		    		<td>
		                Correr
		                {!! Form::number('allPlayers['.$key.'][e_run]', $player->e_run, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Saltar
		                {!! Form::number('allPlayers['.$key.'][e_jump]', $player->e_jump, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Caminar
		                {!! Form::number('allPlayers['.$key.'][e_walk]', $player->e_walk, array('class' => 'form-control')) !!}
		            </td>
		            <td>
		                Estar parado
		                {!! Form::number('allPlayers['.$key.'][e_stand]', $player->e_stand, array('class' => 'form-control')) !!}
		            </td>
		    	</tr>
		    </table>
		  </div>
		</div>
	@endforeach -->

    <div class="col-md-12 text-center">
		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!} <br><br>
	</div>

    {!! Form::close() !!}
</div>
@stop