@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-12">
    <h2>Editar Torneo</h2>

    {!! Form::model($tournament, ['route' => ['tournaments.update', $tournament->id], 'method' => 'PUT']) !!}

        <div class="form-group">
		    {!!  Form::label('name', 'Torneo bbb') !!}
		    {!! Form::text('name', null , array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!!  Form::label('season', 'Temporada') !!}
			{!! Form::select('season_id',$seasons->pluck('name','id'), null, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('date_init', 'Fecha de Inicio') !!}
		    {!! Form::date('date_init', null, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('date_end', 'Fecha de Termino') !!}
		    {!! Form::date('date_end', null, array('class' => 'form-control')) !!}
		</div>

		<table class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <td>Jugador</td>
		            <td>#</td>
		            <td></td>
		            <!-- <td><a class="btn btn-small btn-warning" href="{{ URL::to('players/create') }}">Crear</a></td> -->
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($allPlayers as $key => $player)
		        <tr>
		        	{!! Form::hidden('allPlayers['.$key.'][id]', $player->id) !!}


		            <td>{{ $player->name }}</td>

					<td>{!! Form::number('allPlayers['.$key.'][player_number]', $player->player_number, array('class' => 'form-control')) !!}</td>

		            <td> 
		                {!! Form::checkbox('allPlayers['.$key.'][is_checked]', true, $player->is_checked ? 1 : 0) !!} 	
		            </td>
		        </tr>
		    @endforeach
		    </tbody>
		</table>

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop