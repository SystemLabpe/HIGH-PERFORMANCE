@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-12">
    <h2>Crear Estadio</h2>

    {!! Form::open(['route' => 'stadiums.store', 'class' => 'form-horizontal']) !!}

        @include('stadium.stadium_form')

    	<div class="col-md-12 text-center">
    		{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}    	
        </div>
    {!! Form::close() !!}
</div>
@stop