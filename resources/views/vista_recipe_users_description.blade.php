@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="mb-4">
            @foreach ($recipes as $recipe)
                <h2>{{ $recipe->recipe_name }}</h2>
                <p>{{ $recipe->recipe_description }}</p>
            @endforeach


            <p></p>


        </div>
        <div class="row">

            <div class="col-6">

                @foreach ($recipes as $recipe)
                    <img src="{{ base64_encode($recipe->recipe_image) }}" alt=" view image in construction " />
                @endforeach

            </div>

            <div class="col-6 steps text-center pt-3">

                <h3>Recipe steps</h3>

                @foreach ($recipes as $recipe)
                    <h4>Prep Time: {{ $recipe->time }} mins</h4>

                    <p>{{ $recipe->steps }}</p>
                @endforeach






            </div>

        </div>
        <div class="col-6 mt-3">


            <h3>Ingredients</h3>
            <ul class="list-unstyled">


                @foreach ($recipes as $recipe)
                    <li>{{ $recipe->ingredient }}</li>
                @endforeach



            </ul>


        </div>




    </div>
    </div>
@endsection
