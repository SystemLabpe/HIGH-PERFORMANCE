@extends('layouts.dashboard')
@section('page_heading','Equipos Rivales')
@section('section')
<div class="col-md-12">
    <p>
        <strong>Equipo:</strong> {{ $rival_team->name }}<br>
    </p>
</div>
@stop