@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <fieldset>
                        <h3>Foods</h3>

                        <form class="d-flex" method="get" action="{{ route('food') }}">
                            <td><input class="form-control me-2" type="text" placeholder="" aria-label="Search"
                                    name="searchFood">
                            </td>

                            <td>
                                <button class="btn btn-outline-success" type="submit" name="action"
                                    value="search">Search</button>
                            </td>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> id </th>
                                    <th scope="col"> Nombre </th>
                                    <th scope="col"> Type </th>

                                </tr>
                            </thead>
                            <tbody>



                                @isset($foodList)
                                    @foreach ($foodList as $food)
                                        <tr>
                                            <td><a
                                                    href="{{ route('food/description', ['valor' => $food['food_id']]) }}">{{ $food['food_id'] }}</a>
                                            </td>
                                            <td>{{ $food['food_name'] }}</td>
                                            <td>{{ $food['food_type'] }}</td>
                                        </tr>
                                    @endforeach
                                @endisset


                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
