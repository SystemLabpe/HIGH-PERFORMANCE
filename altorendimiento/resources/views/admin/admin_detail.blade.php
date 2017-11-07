@extends('layouts.dashboard-admin')
@section('page_heading','Entrenadores')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2>Entrenador: {{ $administrator->first_name }} {{ $administrator->last_name }}</h2>
        <h4><strong>Equipo:</strong> {{ $administrator->club->name }}</h4>
    </p>
</div>
@stop