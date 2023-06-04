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
                @if (isset($recipes['recipe_images']))
                    @foreach ($recipes['recipe_images']['recipe_image'] as $recipe)
                        <img src="{{ $recipe }}" class="img-thumbnail" alt="recipe image ">
                    @endforeach
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="col-6 steps text-center pt-3">

                <h3>Recipe steps</h3>
                @if (isset($recipes['preparation_time_min']))
                    <h4>Prep Time: {{ $recipes['preparation_time_min'] }} mins</h4>
                @else
                    <h4>Prep Time: no data</h4>
                @endif

                @if (isset($recipes['directions']))
                    <p>
                        @foreach ($recipes['directions']['direction'] as $recipe)
                            <p>
                            <h4>Step {{ $recipe['direction_number'] }}:</h4>
                            {{ $recipe['direction_description'] }}
                    </p>
                @endforeach
            @else
                <p>No data</p>
                @endif

            </div>

        </div>
        <div class="col-6 mt-4">

            <h3>Ingredients</h3>
            @if (isset($recipes['number_of_servings']))
                <h4><i class='fa fa-user'></i>&nbspYields: {{ $recipes['number_of_servings'] }} servings</h4>
            @else
                <h4><i class='fa fa-user'></i>&nbspYields: no data servings</h4>
            @endif






            @if (isset($recipes['ingredients']))
                <ul class="list-unstyled">
                    @foreach ($recipes['ingredients']['ingredient'] as $recipe)
                        <li><a href="{{ route('food/description', ['valor' => $recipe['food_id']]) }}">{{ $recipe['food_name'] }}:
                            </a>

                        </li>
                        <p> {{ $recipe['ingredient_description'] }}&nbsp&nbsp&nbsp <i class="fas fa-weight"></i>&nbsp
                            {{ $recipe['number_of_units'] }}({{ $recipe['measurement_description'] }})</p>
                    @endforeach
                </ul>
            @else
                <p>No data</p>
            @endif

        </div>

    </div>
    </div>
@endsection
