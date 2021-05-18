@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula['poster'] }}" alt=""/>
        </div>
        <div class="col-sm-8">
            {{-- TODO: Datos de la película --}}
            <h3>{{$pelicula['title']}}</h3>
            <p><b>Año:</b> {{$pelicula['year']}}</p>
            <p><b>Director:</b> {{ $pelicula['director'] }}</p>
            <p><b>Sinópsis:</b> {{ $pelicula['synopsis'] }}</p>
            <p><b>Estado:</b> {{ $pelicula['rented'] ? 'Alquilada' : 'Disponible' }}</p>
            <button type="button" class="{{ $pelicula['rented'] ? 'btn btn-danger': 'btn btn-success'}}"><i class="{{$pelicula['rented'] ? 'fas fa-undo-alt' : 'fas fa-film'}}"></i> {{ $pelicula['rented'] ? 'Devolver Película':'Alquilar Película' }}</button>
            <a href="/catalog/edit/{{$pelicula['id']}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar Película</a>
            <button type="button" class="btn btn-light"><i class="fas fa-chevron-circle-left"></i> Volver al listado</button>
        </div>
    </div>
@endsection
