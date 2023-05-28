@extends('layouts.base')

@section('content')
    @parent


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Menus</h3>
                
                <hr>

                <table class="table table-striped table-m table-sm">
                    <thead>
                        <tr>

                            <th scope="col" class=" h4"> Name </th>
                            <th scope="col" class=" h4"> Day </th>
                            <th scope="col" class=" h4"> Breakfast </th>
                            <th scope="col" class=" h4"> Lunch </th>
                            <th scope="col" class=" h4"> Sanck </th>
                            <th scope="col" class=" h4"> Dinner </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>

                                <td class="col-1">{{ $menu->name }}</td>
                                <td class="col-1">{{ $menu->dia }}</td>
                                <td class="col-2"><a
                                        href="{{ route('recipe/description', ['valor' => $menu->id_recipe_breakfast]) }}">{{ $menu->name_breakfast }}</a>
                                </td>
                                <td class="col-2"><a
                                        href="{{ route('recipe/description', ['valor' => $menu->id_recipe_lunch]) }}">{{ $menu->name_lunch }}</a>
                                </td>

                                <td class="col-3"><a
                                        href="{{ route('recipe/description', ['valor' => $menu->id_recipe_snack]) }}">{{ $menu->name_snack }}</a>
                                </td>

                                <td class="col-4"><a
                                        href="{{ route('recipe/description', ['valor' => $menu->id_recipe_dinner]) }}">{{ $menu->name_dinner }}</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
