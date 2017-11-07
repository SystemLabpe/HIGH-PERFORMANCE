@extends('layouts.dashboard-admin')
@section('page_heading','Equipos')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Crear Equipo</h2>
	@include('layouts.errors')
	{!! Form::open(['route' => 'clubs.store', 'class' => 'form-horizontal']) !!}

      @include('club.club_form')

		<div class="col-md-12 text-center">
			{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}
		</div>
    {!! Form::close() !!}
</div>
@stop