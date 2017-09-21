@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-12">
    <h2>Crear Temporada</h2>

    {!! Form::open(['route' => 'seasons.store']) !!}

        @include('season_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop