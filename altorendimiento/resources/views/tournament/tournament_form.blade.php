<div class="form-group">
    {!!  Form::label('name', 'Torneo') !!}
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
    @foreach($players as $key => $player)
        <tr>
        	{{ Form::hidden('players['.$key.'][id]', $player->id) }}
            <td>{{ $player->name }}</td>

			<td>{!! Form::number('players['.$key.'][player_number]', null, array('class' => 'form-control')) !!}</td>

            <td> 
            	{!! Form::checkbox('players['.$key.'][is_checked]', true) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>