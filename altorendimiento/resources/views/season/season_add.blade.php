@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Crear Temporada</h2>
    @include('layouts.errors')
    {!! Form::open(['route' => 'seasons.store', 'class' => 'form-horizontal']) !!}

        @include('season.season_form')

        <div class="col-md-12 text-center">
    		{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}    	
        </div>
    {!! Form::close() !!}
</div>
@stop