@extends('layouts.dashboard-admin')
@section('page_heading','Equipos')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Editar Equipo</h2>
    @include('layouts.errors')
    {!! Form::model($club, ['route' => ['clubs.update', $club->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

        @include('club.club_form')

        <div class="col-md-12 text-center">
    		{!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}
    	</div>

    {!! Form::close() !!}
</div>
@stop