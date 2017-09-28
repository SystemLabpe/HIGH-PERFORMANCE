@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Temporada {{ $season->name }}</h2>

    {!! Form::model($season, ['route' => ['seasons.update', $season->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('season.season_form')

		<div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop