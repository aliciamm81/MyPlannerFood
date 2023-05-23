@extends('layouts.base')

@section('content')
    @parent


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Lista de menus</h3>

                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Day </th>
                            <th scope="col"> Id_breakfast </th>
                            <th scope="col"> breakfast </th>
                            <th scope="col"> Id_Lunch </th>
                            <th scope="col"> Lunch </th>
                            <th scope="col"> Id_Sanck </th>
                            <th scope="col"> Sanck </th>
                            <th scope="col"> Id_ Dinner </th>
                            <th scope="col"> Dinner </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->dia }}</td>

                                <td><a href="{{ route('recipe/description', ['valor' => $menu->id_recipe_breakfast]) }}">{{ $menu->id_recipe_breakfast }}
                                    </a>
                                </td>

                                <td>{{ $menu->name_breakfast }}</td>
                                <td>{{ $menu->id_recipe_lunch }}</td>
                                <td>{{ $menu->name_lunch }}</td>
                                <td>{{ $menu->id_recipe_snack }}</td>
                                <td>{{ $menu->name_snack }}</td>
                                <td>{{ $menu->id_recipe_dinner }}</td>
                                <td>{{ $menu->name_dinner }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
