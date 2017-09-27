@extends('layouts.dashboard')
@section('page_heading','Partidos')
@section('section')
<div class="col-md-12">
    <h2>Editar Partido {{ $match->name }}</h2>

    {!! Form::model($match, ['route' => ['matchs.update', $match->id], 'method' => 'PUT']) !!}

        @include('match.match_form')

    {!! Form::submit('Editar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@stop