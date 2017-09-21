@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-12">
    <h2>Crear Torneo</h2>

    {!! Form::open(['route' => 'tournaments.store']) !!}

        @include('tournament.tournament_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop