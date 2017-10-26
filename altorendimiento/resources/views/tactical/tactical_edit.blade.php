@extends('layouts.dashboard')
@section('page_heading','Tácticas')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Táctica {{ $tactical->name }}</h2>
    @include('layouts.errors')
    {!! Form::model($tactical, ['route' => ['tacticals.update', $tactical->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('tactical.tactical_form')

		<div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop