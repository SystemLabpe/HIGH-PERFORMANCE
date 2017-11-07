@extends('layouts.dashboard-admin')
@section('page_heading','Entrenadores')
@section('section')
<div class="col-md-6 col-md-offset-3">
    @include('layouts.info')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td class="col-md-7">Entrenador</td>
                <td class="col-md-5"><a class="btn btn-small btn-warning" href="{{ URL::to('administrators/create') }}">Crear</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($administrators as $key => $value)
            <tr>
                <td>{{ $value->first_name }} {{ $value->last_name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('administrators/' . $value->id) }}">Detalle</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('administrators/' . $value->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    {!! $administrators->links() !!}
</div>
@stop