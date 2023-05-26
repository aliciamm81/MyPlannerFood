@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="mb-4">
            <h2>{{ $recipes['recipe_name'] }} </h2>

            <p>{{ $recipes['recipe_description'] }}</p>


        </div>
        <div class="row">

            <div class="col-6">

                @foreach ($recipes['recipe_images']['recipe_image'] as $recipe)
                    <img src="{{ $recipe }}" class="img-thumbnail" alt="...">
                @endforeach

            </div>

            <div class="col-6 steps text-center pt-3">

                <h3>Recipe steps</h3>
                <p>
                    @foreach ($recipes['directions']['direction'] as $recipe)
                        <p>
                        <h4>Step {{ $recipe['direction_number'] }}:</h4>
                        {{ $recipe['direction_description'] }}
                </p>
                @endforeach

            </div>

        </div>
        <div class="col-6 mt-3">


            <h3>Ingredients</h3>
            <ul class="list-unstyled">
                @foreach ($recipes['ingredients']['ingredient'] as $recipe)
                    <li><a href="{{ route('food/description', ['valor' => $recipe['food_id']]) }}">{{ $recipe['food_name'] }}:
                        </a>

                    </li>
                    <p> {{ $recipe['ingredient_description'] }}&nbsp&nbsp&nbsp <i class="fas fa-weight"></i>&nbsp
                        {{ $recipe['number_of_units'] }}({{ $recipe['measurement_description'] }})</p>
                @endforeach
            </ul>


        </div>




    </div>
    </div>
@endsection
