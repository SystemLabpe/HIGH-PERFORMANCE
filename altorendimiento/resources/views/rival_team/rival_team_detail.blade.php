@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2>Equipo: {{ $rival_team->name }}</h2>
    </p>
</div>
@stop