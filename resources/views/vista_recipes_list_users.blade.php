@extends('layouts.base')

@section('content')
    @parent


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>The Recipes List</h3>

                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Ingredients </th>
                            <th scope="col"> Calories </th>
                            <th scope="col"> carbohydrate </th>
                            <th scope="col"> fat </th>
                            <th scope="col"> protein </th>
                            <th scope="col"> Sanck </th>
                            <th scope="col"> recipe_image </th>
                            <th scope="col"> Users </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>
                                    <a href="{{ route('recipe/users/description', ['valor' => $recipe->id]) }}">{{ $recipe->id }}
                                    </a>
                                </td>
                                <td>{{ $recipe->recipe_name }}</td>
                                <td>{{ $recipe->recipe_description }}</td>
                                <td>{{ $recipe->ingredient }}</td>
                                <td>{{ $recipe->calories }}</td>
                                <td>{{ $recipe->carbohydrate }}</td>
                                <td>{{ $recipe->fat }}</td>
                                <td>{{ $recipe->protein }}</td>
                                <td>{{ $recipe->recipe_image }}</td>
                                <td>{{ $recipe->user_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
