@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-12">
    <h2>Crear Estadio</h2>

    {!! Form::open(['route' => 'stadium.store']) !!}

        @include('stadium.stadium_form')

    {!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop