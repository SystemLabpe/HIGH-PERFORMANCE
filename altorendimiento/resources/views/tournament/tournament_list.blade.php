@extends('layouts.dashboard')
@section('page_heading','Torneos')
@section('section')
<div class="col-md-6 col-md-offset-3">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td class="col-md-4">Torneo</td>
                <td class="col-md-4">Temporada</td>
                <td class="col-md-4"><a class="btn btn-small btn-warning" href="{{ URL::to('tournaments/create') }}">Crear</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($tournaments as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->season->name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('tournaments/' . $value->id) }}">Detalle</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('tournaments/' . $value->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop