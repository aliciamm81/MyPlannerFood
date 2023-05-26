@extends('layouts.base')

@section('content')
    @parent


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>The Recipes List</h3>

                <table class="table table-striped table-m table-sm">
                    <thead>
                        <tr>

                            <th scope="col" class=" h4"> Name </th>
                            <th scope="col" class=" h4"> Description </th>
                            <th scope="col" class=" h4"> Ingredients </th>
                            <th scope="col" class=" h4"> Cal </th>
                            <th scope="col" class=" h4"> Carb </th>
                            <th scope="col" class=" h4"> Fat </th>
                            <th scope="col" class=" h4"> Prot </th>
                            <th scope="col" class=" h4"> Image </th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td class="col-1">
                                    <a href="{{ route('recipe/users/description', ['valor' => $recipe->id]) }}">{{ $recipe->recipe_name }}
                                    </a>
                                </td>

                                <td class="col-4">{{ $recipe->recipe_description }}</td>
                                <td class="col-3">{{ $recipe->ingredient }}</td>
                                <td class="col-1 ">{{ $recipe->calories }}</td>
                                <td class="col-1">{{ $recipe->carbohydrate }}</td>
                                <td class="col-1">{{ $recipe->fat }}</td>
                                <td class="col-1">{{ $recipe->protein }}</td>
                                <td class="col-3"{{ $recipe->recipe_image }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
