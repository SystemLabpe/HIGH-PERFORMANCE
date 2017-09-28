@extends('layouts.dashboard')
@section('page_heading','Jugadores')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2>Jugador: {{ $player->name }}</h2>
        <h4><strong>Talla:</strong> {{ $player->height }} m</h4>
        <h4><strong>Peso:</strong> {{ $player->weight }} Kg</h4>
        <h4><strong>Fecha de Nacimiento:</strong> {{ $player->birth_date }}</h4>
    </p>
</div>
@stop