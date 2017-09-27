@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-12">
    <h2>Editar Estadio {{ $stadium->name }}</h2>

    {!! Form::model($stadium, ['route' => ['stadiums.update', $stadium->id], 'method' => 'PUT']) !!}

        @include('stadium.stadium_form')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop