@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-12">
    <h2>Editar Equipo Rival {{ $rival_team->name }}</h2>

    {!! Form::model($rival_team, ['route' => ['rival_teams.update', $rival_team->id], 'method' => 'PUT']) !!}

        @include('rival_team.rival_team_form')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop