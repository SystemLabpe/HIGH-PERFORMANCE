<div class="form-group">
    {!!  Form::label('name', 'Torneo') !!}
    {!! Form::text('name', null , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::select('season',$seasons, null, array('class' => 'form-control')) !!}

	<!-- <select name="myselect">
	@foreach ($seasons as $key => $value)
	    <option value="{{ $key }}"
	    
	    >{{ $value }}</option>
	@endforeach
	</select> -->
</div>

<div class="form-group">
    {!! Form::label('date_init', 'Fecha de Inicio') !!}
    {!! Form::date('date_init', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Fecha de Termino') !!}
    {!! Form::date('date_end', null, array('class' => 'form-control')) !!}
</div>