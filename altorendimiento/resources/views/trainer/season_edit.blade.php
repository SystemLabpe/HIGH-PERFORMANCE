@extends('layouts.dashboard')
@section('page_heading','Temporadas')
@section('section')
<div class="col-md-12">
    <h2>Editar Temporada {{ $season->name }}</h2>

    {!! Form::model($season, ['route' => ['seasons.update', $season->id], 'method' => 'PUT']) !!}

        @include('trainer.season_form')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop