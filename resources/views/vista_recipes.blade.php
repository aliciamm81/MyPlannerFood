@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form>
                    <fieldset>
                        <legend>Recetas</legend>
                        <table class="table table-striped  table-sm">
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

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
