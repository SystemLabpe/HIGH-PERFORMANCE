@extends('layouts.dashboard')
@section('page_heading','Estadios')
@section('section')
<div class="col-md-6 col-md-offset-3">
    @include('layouts.info')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td class="col-md-7">Estadio</td>
                <td class="col-md-5"><a class="btn btn-small btn-warning" href="{{ URL::to('stadiums/create') }}">Crear</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($stadiums as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('stadiums/' . $value->id) }}">Detalle</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('stadiums/' . $value->id . '/edit') }}">Editar</a>

                    <!-- {!! Form::open(['route' => ['stadiums.destroy', $value->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-link">
                            Borrar
                        </button>
                    {!! Form::close() !!} -->

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $stadiums->links() !!}
</div>
@stop











