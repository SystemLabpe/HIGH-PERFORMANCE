<div class="form-group">
    {!! Form::label('first_name', 'Nombre', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::text('first_name', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Apellido', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::text('last_name', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::email('email', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Contraseña', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::password('password', null, array('class' => 'form-control', 'required' => '')) !!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('club', 'Equipo', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-6">
    	{!! Form::select('club_id', $clubs->pluck('name','id'), null , array('class' => 'form-control', 'placeholder' => 'Seleccione Equipo', 'required' => '')) !!}
    </div>				    
</div>