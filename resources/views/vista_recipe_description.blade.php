@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-8">

                @foreach ($recipes['recipe_images']['recipe_image'] as $recipe)
                    <img src="{{ $recipe }}" class="img-thumbnail" alt="...">
                @endforeach

            </div>
            <div class="col-4">


                <h3>Ingredients</h3>
                <ul>
                    @foreach ($recipes['ingredients']['ingredient'] as $recipe)
                        <li><a
                                href="{{ route('food/description', ['valor' => $recipe['food_id']]) }}">{{ $recipe['ingredient_description'] }}</a>
                        </li>
                    @endforeach
                </ul>


            </div>
            <div class="col-6">

                <h3>Description</h3>
                <ul>
                    @foreach ($recipes['directions']['direction'] as $recipe)
                        <li>{{ $recipe['direction_description'] }}</li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
@endsection
