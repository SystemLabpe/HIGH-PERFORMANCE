<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('height', 'Talla (m)') !!}
    {!! Form::number('height', null, ['class' => 'form-control','step'=>'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('weight', 'Peso (Kg)') !!}
    {!! Form::number('weight', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('birth_date', 'Fecha de Nacimiento') !!}
    {!! Form::date('birth_date', null, array('class' => 'form-control')) !!}
</div>