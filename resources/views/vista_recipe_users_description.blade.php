@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            @foreach ($recipes as $recipe)
                <h3>{{ $recipe->recipe_name }}</h3>
            @endforeach
            <div class="col-8">

                @foreach ($recipes as $recipe)
                    <img src="{{ $recipe->recipe_image }}" class="img-thumbnail" alt="...">
                @endforeach

            </div>
            <div class="col-4">


                <h3>Ingredient</h3>
                <ul>
                    @foreach ($recipes as $recipe)
                        <li>{{ $recipe->ingredient }}</li>
                    @endforeach
                </ul>


            </div>
            <div class="col-6">

                <h3>Description</h3>
                <ul>
                    @foreach ($recipes as $recipe)
                        <li>{{ $recipe->recipe_description }}</li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
@endsection
