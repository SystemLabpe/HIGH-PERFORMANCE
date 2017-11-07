@extends('layouts.dashboard-admin')
@section('page_heading','Aministradores')
@section('section')
<div class="col-md-8 col-md-offset-2">
    <h2>Crear Administrador</h2>
	@include('layouts.errors')
	{!! Form::open(['route' => 'administrators.store', 'class' => 'form-horizontal']) !!}

      @include('admin.admin_form')

		<div class="col-md-12 text-center">
			{!! Form::submit('Crear', array('class' => 'btn btn-primary')) !!}
		</div>
    {!! Form::close() !!}
</div>
@stop