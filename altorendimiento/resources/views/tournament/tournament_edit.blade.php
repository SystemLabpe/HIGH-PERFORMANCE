@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-12">
    <h2>Editar Torneo</h2>

    {!! Form::model($tournament, ['route' => ['tournaments.update', $tournament->id], 'method' => 'PUT']) !!}

        @include('tournament.tournament_form_edit')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop