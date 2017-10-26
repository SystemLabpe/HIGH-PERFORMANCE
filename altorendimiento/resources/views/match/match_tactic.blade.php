@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
	<h2>Módulo Táctico</h2>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Equipo Rival: {{ $match->rival_team->name }} </h3>
		</div>
	</div>
	<br>
	@include('layouts.errors')

	{!! Form::model($match, ['route' => ['matchs.updateTechnicalPhysical', $match->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}