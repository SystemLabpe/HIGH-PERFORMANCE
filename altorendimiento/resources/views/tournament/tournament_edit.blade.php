@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Torneo</h2>

    {!! Form::model($tournament, ['route' => ['tournaments.update', $tournament->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        <div class="form-group">
		    {!!  Form::label('name', 'Torneo', ['class' => 'control-label col-md-4']) !!}
		    <div class="col-md-6">
		    	{!! Form::text('name', null , array('class' => 'form-control')) !!}
		    </div>
		</div>

		<div class="form-group">
			{!!  Form::label('season', 'Temporada', ['class' => 'control-label col-md-4']) !!}
			<div class="col-md-4">
				{!! Form::select('season_id',$seasons->pluck('name','id'), null, array('class' => 'form-control')) !!}
			</div>			
		</div>

		<div class="form-group">
		    {!! Form::label('date_init', 'Fecha de Inicio', ['class' => 'control-label col-md-4']) !!}
		    <div class="col-md-4">
		    	{!! Form::date('date_init', null, array('class' => 'form-control')) !!}
		    </div>		    
		</div>

		<div class="form-group">
		    {!! Form::label('date_end', 'Fecha de Termino', ['class' => 'control-label col-md-4']) !!}
		    <div class="col-md-4">
		    	{!! Form::date('date_end', null, array('class' => 'form-control')) !!}
		    </div>		    
		</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3>Jugadores</h3>
				<table class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <td class="col-md-7">Jugador</td>
				            <td class="col-md-4">#</td>
				            <td class="col-md-1"></td>
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
			</div>
		</div>

		<div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop