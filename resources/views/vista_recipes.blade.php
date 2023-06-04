@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row col-md-12 ">
            <div class="row gx-1 ">
                <form class="row gx-1" method="get" action="{{ route('recipes') }}">
                    <h1>Recipes</h1>

                    <div class="col-md-5 ">
                        <input class="form-control " type="text" placeholder="Search recipe" aria-label="Search"
                            name="recipes">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-outline-success" type="submit" name="action"
                            value="recipes">Search</button>
                    </div>

                </form>

            </div>

            <table class="table table-striped table-m table-sm">
                <thead>

                    <tr>
                        <th scope="col" class=" h4"> Id </th>
                        <th scope="col" class=" h4"> Name </th>
                        <th scope="col" class=" h4"> Description </th>
                        <th scope="col" class=" h4"> Cal </th>
                        <th scope="col" class=" h4"> Carb </th>
                        <th scope="col" class=" h4"> Fat </th>
                        <th scope="col" class=" h4"> Prot </th>
                        <th scope="col" class=" h4"> Image </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipeList as $dato)
                        <tr>
                            <td class="col-1"><a href="{{ route('recipe/description', ['valor' => $dato['recipe_id']]) }}">
                                    {{ $dato['recipe_id'] }}</a></td>
                            <td class="col-2">{{ $dato['recipe_name'] }}</td>
                            <td class="col-3">{{ $dato['recipe_description'] }}</td>
                            <td class="col-1">{{ $dato['recipe_nutrition']['calories'] }}</td>
                            <td class="col-1">{{ $dato['recipe_nutrition']['carbohydrate'] }}</td>
                            <td class="col-1">{{ $dato['recipe_nutrition']['fat'] }}</td>
                            <td class="col-1">{{ $dato['recipe_nutrition']['protein'] }}</td>

                            <td class="col-8">
                                @if (isset($dato['recipe_image']))
                                    <img class="img-thumbnail" style="width: 200px; height: 150px;"
                                        src=" {{ $dato['recipe_image'] }}">
                                @else
                                    No image available
                                @endif
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
@endsection
