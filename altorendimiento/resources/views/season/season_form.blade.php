<div class="form-group">
    {!!  Form::label('name', 'Temporada', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
    	{!! Form::text('name', null , array('class' => 'form-control', 'required' => '')) !!}	
    </div>      
</div>

<div class="form-group">
    {!! Form::label('date_init', 'Fecha de Inicio', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{!! Form::date('date_init', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Fecha de Termino', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-4">
    	{!! Form::date('date_end', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>