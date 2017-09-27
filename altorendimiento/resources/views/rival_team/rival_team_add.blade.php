@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-12">
    <h2>Crear Equipo Rival</h2>

    {!! Form::open(['route' => 'seasons.store']) !!}

        @include('season.season_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop