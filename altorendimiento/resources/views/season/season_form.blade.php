<div class="form-group">
    {!!  Form::label('name', 'Temporada') !!}
    {!! Form::text('name', null , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('date_init', 'Fecha de Inicio') !!}
    {!! Form::date('date_init', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Fecha de Termino') !!}
    {!! Form::date('date_end', null, array('class' => 'form-control')) !!}
</div>