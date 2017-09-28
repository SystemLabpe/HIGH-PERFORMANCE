@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-12">
    <h2>Editar Estadio {{ $stadium->name }}</h2>

    {!! Form::model($stadium, ['route' => ['stadiums.update', $stadium->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('stadium.stadium_form')

    	<div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop