@extends('layouts.dashboard-admin')
@section('page_heading','Entrenadores')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Entrenadore</h2>
    @include('layouts.errors')
    {!! Form::model($administrator, ['route' => ['administrators.update', $administrator->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('administrator.administrator_form')

        <div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop