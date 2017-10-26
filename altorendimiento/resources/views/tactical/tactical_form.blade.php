<div class="form-group">
    {!!  Form::label('name', 'Táctica', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
    	{!! Form::text('name', null , array('class' => 'form-control', 'required' => '')) !!}	
    </div>
</div>
<div class="form-group">
	{!!  Form::label('tactical_type', 'Tipo de Táctica', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
    	{!! Form::select('tactical_type',['1' => 'De Sistema', '2' => 'De Fija'], null, array('class' => 'form-control', 'placeholder' => 'Seleccione Tipo', 'required' => '')) !!}
    </div>
</div>
<div class="form-group">
	{!!  Form::label('desc', 'Descripción', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{{ Form::textarea('desc', null, ['size' => '35x3']) }}
    </div>
</div>
