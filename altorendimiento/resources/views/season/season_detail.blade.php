@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-12">
    <p>
        <strong>Temporada:</strong> {{ $season->name }}<br>
        <strong>Fecha de Inicio:</strong> {{ $season->date_init }}
        <strong>Fecha de Termino:</strong> {{ $season->date_end }}
    </p>
</div>
@stop