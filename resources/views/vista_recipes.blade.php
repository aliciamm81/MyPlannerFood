@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <fieldset>
                        <legend>Recetas</legend>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col"> Id </th>
                                    <th scope="col"> Nombre </th>
                                    <th scope="col"> Descripcion </th>
                                    <th scope="col"> Calorias </th>
                                    <th scope="col"> Carbohidratos </th>
                                    <th scope="col"> Fat </th>
                                    <th scope="col"> Proteinas </th>
                                    <th scope="col"> Ingredientes </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipeList as $dato)
                                    <tr>
                                        <td><a href="{{ route('recipe/description', ['valor' => $dato['recipe_id']]) }}">
                                                {{ $dato['recipe_id'] }}</a></td>
                                        <td>{{ $dato['recipe_name'] }}</td>
                                        <td>{{ $dato['recipe_description'] }}</td>
                                        <td>{{ $dato['recipe_nutrition']['calories'] }}</td>
                                        <td>{{ $dato['recipe_nutrition']['carbohydrate'] }}</td>
                                        <td>{{ $dato['recipe_nutrition']['fat'] }}</td>
                                        <td>{{ $dato['recipe_nutrition']['protein'] }}</td>
                                        <td>{{ implode(',', $dato['recipe_ingredients']['ingredient']) }}</td>
                                        <td><img src="{{ $dato['recipe_image'] }}"></img></td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
