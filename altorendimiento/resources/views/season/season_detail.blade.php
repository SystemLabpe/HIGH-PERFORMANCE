@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2>Temporada: {{ $season->name }}</h2>
        <h4><strong>Fecha de Inicio:</strong> {{ $season->date_init }} </h4>
        <h4><strong>Fecha de Termino:</strong> {{ $season->date_end }} </h4>
    </p>
</div>
@stop