@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2><strong>Estadio:</strong> {{ $stadium->name }}</h2>
    </p>
</div>
@stop