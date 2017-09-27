<div class="form-group">
    {!!  Form::label('stadium', 'Estadio') !!}
    {!! Form::select('stadium_id', $stadium->pluck('name','id') , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!!  Form::label('tournament', 'Torneo') !!}
    {!! Form::select('tournament_id', $tournaments->pluck('name','id') , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!!  Form::label('rival_team', 'Equipo Rival') !!}
    {!! Form::select('rival_team_id', $rival_teams->pluck('name','id') , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('match_date', 'Fecha de Partido') !!}
    {!! Form::date('match_date', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('match_date', 'Fecha de Partido') !!}
    {!! Form::date('match_date', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {{ Form::radio('is_local', '1') }} Local <br> {{ Form::radio('is_local', '0') }} Visitante
</div>

<div class="form-group">
    {!!  Form::label('local_store', 'Goles Local') !!}
    {!! Form::number('local_store', null , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!!  Form::label('visitor_store', 'Goles Visitante') !!}
    {!! Form::number('visitor_store', null , array('class' => 'form-control')) !!}
</div>