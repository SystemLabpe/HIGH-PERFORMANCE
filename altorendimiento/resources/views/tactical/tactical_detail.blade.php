@extends('layouts.dashboard')
@section('page_heading','Táctica')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <p>
        <h2>Táctica: {{ $tactical->name }}</h2>
        <h4><strong>Tipo:</strong> {{ $tactical->tactical_type == 1 ? 'De Sistema' : 'De Fija' }} </h4>
        <h4><strong>Descripción:</strong> {{ $tactical->desc}}</h4>
    </p>
</div>
@stop