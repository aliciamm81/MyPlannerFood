@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <fieldset>
                        <legend>Recetas</legend>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col"> Id </th>
                                    <th scope="col"> Nombre </th>
                                    <th scope="col"> Descripcion </th>
                                    <th scope="col"> Imagen </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipeList as $dato)
                                    <tr>
                                        <td>{{ $dato['recipe_id'] }}</td>
                                        <td>{{ $dato['recipe_name'] }}</td>
                                        <td>{{ $dato['recipe_description'] }}</td>
                                        <td><img src="{{ $dato['recipe_image'] }}"></img></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
