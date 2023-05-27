@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h2>{{ $datosfood['food_id'] }}-{{ $datosfood['food_name'] }}</h2>

                <h3>Type: {{ $datosfood['food_type'] }}</h3>

                <fieldset>

                    <table class="table table-striped table-m table-sm">
                        <thead>

                            <tr>
                                <th scope="col class=" h4">Description</th>
                                <th scope="col class=" h4">Value</th>
                            </tr>

                        </thead>
                        <tbody>
                            <!-- la api devuelve cosas distintas dependendiendo desde donde se llame
                                     o un array (por tamaños?) o un objeto-->
                            @if (isset($datosfood['servings']['serving'][0]))
                                @php($serving = $datosfood['servings']['serving'][0])
                            @else
                                @php($serving = $datosfood['servings']['serving'])
                            @endif
                            <tr>
                                <td scope="row"> calcium </td>
                                <td>{{ isset($serving['calcium']) ? $serving['calcium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> calories </td>
                                <td>{{ isset($serving['calories']) ? $serving['calories'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> carbohydrate </td>
                                <td>{{ isset($serving['carbohydrate']) ? $serving['carbohydrate'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> cholesterol </td>
                                <td>{{ isset($serving['cholesterol']) ? $serving['cholesterol'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> fat </td>
                                <td>{{ isset($serving['fat']) ? $serving['fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> fiber </td>
                                <td>{{ isset($serving['fiber']) ? $serving['fiber'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> iron </td>
                                <td>{{ isset($serving['iron']) ? $serving['iron'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> measurement_description </td>
                                <td>{{ isset($serving['measurement_description']) ? $serving['measurement_description'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> metric_serving_amount </td>
                                <td>{{ isset($serving['metric_serving_amount']) ? $serving['metric_serving_amount'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> metric_serving_unit </td>
                                <td>{{ isset($serving['metric_serving_unit']) ? $serving['metric_serving_unit'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> monounsaturated_fat </td>
                                <td>{{ isset($serving['monounsaturated_fat']) ? $serving['monounsaturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> number_of_units </td>
                                <td>{{ isset($serving['number_of_units']) ? $serving['number_of_units'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> polyunsaturated_fat </td>
                                <td>{{ isset($serving['polyunsaturated_fat']) ? $serving['polyunsaturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> potassium </td>
                                <td>{{ isset($serving['potassium']) ? $serving['potassium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> protein </td>
                                <td>{{ isset($serving['protein']) ? $serving['protein'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> saturated_fat </td>
                                <td>{{ isset($serving['saturated_fat']) ? $serving['saturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> serving_description </td>
                                <td>{{ isset($serving['serving_description']) ? $serving['serving_description'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> serving_id </td>
                                <td>{{ isset($serving['serving_id']) ? $serving['serving_id'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> sodium </td>
                                <td>{{ isset($serving['sodium']) ? $serving['sodium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> sugar </td>
                                <td>{{ isset($serving['sugar']) ? $serving['sugar'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> vitamin_a </td>
                                <td>{{ isset($serving['vitamin_a']) ? $serving['vitamin_a'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row"> vitamin_c </td>
                                <td>{{ isset($serving['vitamin_c']) ? $serving['vitamin_c'] : 'N/A' }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </fieldset>
            </div>

        </div>
    </div>
@endsection
