@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <fieldset>
                        <h3>Recetas</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Id </th>
                                    <th scope="col"> Nombre </th>
                                    <th scope="col"> Descripcion </th>
                                    <th scope="col"> Imagen </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($food as $datofood)
                                    <tr>
                                        <td>{{ $datofood['food_id'] }}</td>
                                        <td>{{ $datofood['food_name'] }}</td>
                                        <td>{{ $datofood['food_type'] }}</td>
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
