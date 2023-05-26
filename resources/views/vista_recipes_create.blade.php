@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="col-md-12">
            <div class="mb-12">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Crea tu Receta</h3>
                        <form method="get" action="{{ route('recipes/save') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label for="cantidad" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Ingrese el nombre de la receta">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description </label>
                                <textarea type="text" class="form-control" name="description" style="height: 100px" placeholder="description"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ingredient" class="form-label">Ingredient </label>
                                <textarea type="text" class="form-control" name="ingredient" style="height: 100px" placeholder="ingredient"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="calories" class="form-label">Calories </label>
                                <input type="text" class="form-control" name="calories" step=".01"
                                    placeholder="calories">
                            </div>
                            <div class="form-group mb-3">
                                <label for="carbohydrate" class="form-label">Carbohydrate </label>
                                <input type="text" class="form-control" name="carbohydrate" step=".01"
                                    placeholder="carbohydrate">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fat" class="form-label">Fat </label>
                                <input type="text" class="form-control" name="fat" step=".01" placeholder="fat">
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="protein" class="form-label">Protein </label>
                                <input type="text" class="form-control" name="protein" step=".01"
                                    placeholder="protein">
                            </div>
                            <div class="form-group mb-4">

                                <input type="file" class="form-label" name="imagen">

                            </div>

                            <button type="submit" class="btn btn-outline-success">Guardar receta</button>
                        </form>

                    </div>
                </div>
            </div>
        @endsection
