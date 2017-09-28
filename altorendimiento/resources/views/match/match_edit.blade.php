@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <h2>Editar Partido</h2>

    {!! Form::model($match, ['route' => ['matchs.update', $match->id], 'method' => 'PUT']) !!}

        <div class="form-group">
		    {!!  Form::label('stadium', 'Estadio') !!}
		    {!! Form::select('stadium_id', $stadiums->pluck('name','id'), null , array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!!  Form::label('tournament', 'Torneo') !!}
		    {!! Form::select('tournament_id', $tournaments->pluck('name','id'), null , array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!!  Form::label('rival_team', 'Equipo Rival') !!}
		    {!! Form::select('rival_team_id', $rival_teams->pluck('name','id'), null , array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('match_date', 'Fecha de Partido') !!}
		    {!! Form::date('match_date', null, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {{ Form::radio('is_local', '1') }} Local <br> {{ Form::radio('is_local', '0') }} Visitante
		</div>

		<div class="form-group">
		    {!! Form::label('local_score', 'Goles Local') !!}
		    {!! Form::number('local_score', null , array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('visitor_score', 'Goles Visitante') !!}
		    {!! Form::number('visitor_score', null , array('class' => 'form-control')) !!}
		</div>

		<h3>Jugadores</h3>

		<table class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <td>Jugador</td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <!-- <td><a class="btn btn-small btn-warning" href="{{ URL::to('players/create') }}">Crear</a></td> -->
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($allPlayers as $key => $player)
		        <tr>
		            {!! Form::hidden('allPlayers['.$key.'][id]', $player->id) !!}
		            <td rowspan="2">{{ $player->name }}</td>

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

		            <td rowspan="2"> 
		                {!! Form::checkbox('allPlayers['.$key.'][is_checked]', true, $player->is_checked ? 1 : 0) !!}
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
		    @endforeach
		    </tbody>
		</table>

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop