@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-12">
    <p>
        <strong>Estadio:</strong> {{ $stadium->name }}<br>
    </p>
</div>
@stop