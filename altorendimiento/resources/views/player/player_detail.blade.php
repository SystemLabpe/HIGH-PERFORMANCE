@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-12">
    <p>
        <strong>Jugador:</strong> {{ $player->name }}<br>
        <strong>Talla (m):</strong> {{ $player->height }}
        <strong>Peso (Kg):</strong> {{ $player->weight }}
        <strong>Fecha de Nacimiento:</strong> {{ $player->birth_date }}
    </p>
</div>
@stop