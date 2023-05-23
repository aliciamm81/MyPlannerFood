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
                        <form method="get" action="{{ route('recipes/save') }}">

                            @csrf
                            <label for="cantidad" class="form-label">Name </label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Ingrese el nombre de la receta">

                            <label for="description" class="form-label">Description </label>
                            <input type="text" class="form-control" name="description" step=".01"
                                placeholder="description">

                            <label for="ingredient" class="form-label">Ingredient </label>
                            <input type="text" class="form-control" name="ingredient" step=".01"
                                placeholder="ingredient">

                            <label for="calories" class="form-label">Calories </label>
                            <input type="text" class="form-control" name="calories" step=".01"
                                placeholder="calories">

                            <label for="carbohydrate" class="form-label">Carbohydrate </label>
                            <input type="text" class="form-control" name="carbohydrate" step=".01"
                                placeholder="carbohydrate">

                            <label for="fat" class="form-label">Fat </label>
                            <input type="text" class="form-control" name="fat" step=".01" placeholder="fat">

                            <label for="protein" class="form-label">Protein </label>
                            <input type="text" class="form-control" name="protein" step=".01" placeholder="protein">
                            <br>
                            <label for="recipe_image" class="form-label">Recipe_image </label>
                            <input type="text" class="form-control" name="recipe_image" step=".01"
                                placeholder="recipe_image">

                            <button type="submit" class="btn btn-primary">Guardar receta</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <form class="d-flex" method="get" action="{{ route('recipe/create') }}">
                    @csrf
                    <div class="col-md-8 mb-4">
                        <table class="table">
                            <tr>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="selectFranja"
                                        id="selectFranja">
                                        <option selected></option>
                                        <option value="1">Desayuno</option>
                                    </select>
                                </td>



                                <td><input class="form-control me-2" type="text" placeholder="" aria-label="Search"
                                        name="searchRecipe">
                                </td>

                                <td>
                                    <button class="btn btn-outline-success" type="submit" name="action"
                                        value="search">Search</button>
                                </td>

                                <td>
                                    <button class="btn btn-outline-success" type="submit" name="action"
                                        value="add">Add</button>
                                </td>

                            </tr>
                        </table>
                    </div>
                </form>



            </div>
        @endsection
