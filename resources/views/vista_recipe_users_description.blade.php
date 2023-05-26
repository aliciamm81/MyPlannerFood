@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="mb-4">
            @foreach ($recipes as $recipe)
                <h2>{{ $recipe->recipe_name }}</h2>
            @endforeach

            <p></p>


        </div>
        <div class="row">

            <div class="col-6">

                @foreach ($recipes as $recipe)
                    <img src="images/{{ $recipe->recipe_image }}" alt="Imagen de la receta" />
                @endforeach
            </div>

            <div class="col-6 steps text-center pt-3">

                <h3>Recipe steps</h3>

                @foreach ($recipes as $recipe)
                    <p>{{ $recipe->recipe_description }}</p>
                @endforeach

                <h4>Step :</h4>




            </div>

        </div>
        <div class="col-6 mt-3">


            <h3>Ingredients</h3>
            <ul class="list-unstyled">


                @foreach ($recipes as $recipe)
                    <li>{{ $recipe->ingredient }}</li>
                @endforeach

                <p> &nbsp&nbsp&nbsp <i class="fas fa-weight"></i>&nbsp
                </p>

            </ul>


        </div>




    </div>
    </div>
@endsection
