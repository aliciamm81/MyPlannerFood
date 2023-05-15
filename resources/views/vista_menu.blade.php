@extends('layouts.base')

@section('content')
    @parent

    <div class="container">
        <div class="col-md-6">
            <div class="mb-3">
                <h4>Crea tu Menu</h4>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Selecciona el día de la semana</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miercoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sábado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>
            <div class="mb-3">
                <form class="d-flex" method="get" action="{{ route('menu') }}">
                    @csrf
                    <input class="form-control me-2" type="text" placeholder="recipe" aria-label="Search"
                        name="searchFood">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                @if ($foodList)
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($foodList as $receta)
                            <option>{{ $receta['food_name'] }}</option>
                        @endforeach
                    </select>
                @else
                    <h3>Inserta un valor</h3>
                @endif
            </div>

        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>selecciona tipo</option>
                    <option value="1">Desayuno</option>
                    <option value="2">Comida</option>
                    <option value="3">Merienda</option>
                    <option value="3">Cena</option>
                </select>
            </div>
        </div>
    </div>
@endsection
