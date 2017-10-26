@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
	<h2>Módulo Físico Técnico</h2>
	<div class="col-md-6 col-md-offset-3">
		<h3>Equipo Rival: {{ $match->rival_team->name }} </h3>
	</div>
	@include('layouts.errors')
	{!! Form::model($match, ['route' => ['matchs.updateTechnicalPhysical', $match->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

	@foreach($allPlayers as $key => $player)
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
	@endforeach

	<div class="col-md-12 text-center">
		{!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!} <br><br>
	</div>
	{!! Form::close() !!}
</div>
@stop
