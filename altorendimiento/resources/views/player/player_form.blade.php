<div class="form-group">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::text('name', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('height', 'Talla (m)', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{!! Form::number('height', null, ['class' => 'form-control','step'=>'any', 'required' => '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('weight', 'Peso (Kg)', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{!! Form::number('weight', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{!! Form::date('birth_date', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>