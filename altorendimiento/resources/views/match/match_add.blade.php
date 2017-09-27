@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <h2>Crear Partido</h2>

    {!! Form::open(['route' => 'matchs.store']) !!}

        @include('match.match_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop