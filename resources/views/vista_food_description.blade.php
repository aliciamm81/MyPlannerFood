@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h2>{{ $datosfood['food_id'] }}-{{ $datosfood['food_name'] }}</h2>

                <h3>Type: {{ $datosfood['food_type'] }}</h3>

                <fieldset>

                    <table class="table table-striped table-sm">
                        <thead>

                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Value</th>
                            </tr>

                        </thead>
                        <tbody>



                            <tr>

                                <th scope="row"> calcium </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['calcium']) ? $datosfood['servings']['serving'][0]['calcium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> calories </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['calories']) ? $datosfood['servings']['serving'][0]['calories'] : 'N/A' }}
                                </td>

                            </tr>
                            <tr>
                                <th scope="row"> carbohydrate </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['carbohydrate']) ? $datosfood['servings']['serving'][0]['carbohydrate'] : 'N/A' }}
                                </td>

                            </tr>
                            <tr>
                                <th scope="row"> cholesterol </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['cholesterol']) ? $datosfood['servings']['serving'][0]['cholesterol'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> fat </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['fat']) ? $datosfood['servings']['serving'][0]['fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> fiber </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['fiber']) ? $datosfood['servings']['serving'][0]['fiber'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> iron </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['iron']) ? $datosfood['servings']['serving'][0]['iron'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> measurement_description </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['measurement_description']) ? $datosfood['servings']['serving'][0]['measurement_description'] : 'N/A' }}
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"> metric_serving_amount </th>


                                <td>{{ isset($datosfood['servings']['serving'][0]['metric_serving_amount']) ? $datosfood['servings']['serving'][0]['metric_serving_amount'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> metric_serving_unit </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['metric_serving_unit']) ? $datosfood['servings']['serving'][0]['metric_serving_unit'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> monounsaturated_fat </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['monounsaturated_fat']) ? $datosfood['servings']['serving'][0]['monounsaturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> number_of_units </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['number_of_units']) ? $datosfood['servings']['serving'][0]['number_of_units'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> polyunsaturated_fat </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['polyunsaturated_fat']) ? $datosfood['servings']['serving'][0]['polyunsaturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> potassium </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['potassium']) ? $datosfood['servings']['serving'][0]['potassium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> protein </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['protein']) ? $datosfood['servings']['serving'][0]['protein'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> saturated_fat </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['saturated_fat']) ? $datosfood['servings']['serving'][0]['saturated_fat'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> serving_description </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['serving_description']) ? $datosfood['servings']['serving'][0]['serving_description'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> serving_id </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['serving_id']) ? $datosfood['servings']['serving'][0]['serving_id'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> sodium </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['sodium']) ? $datosfood['servings']['serving'][0]['sodium'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> sugar </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['sugar']) ? $datosfood['servings']['serving'][0]['sugar'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> vitamin_a </th>
                                <td>{{ isset($datosfood['servings']['serving'][0]['vitamin_a']) ? $datosfood['servings']['serving'][0]['vitamin_a'] : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> vitamin_c </th>

                                <td>{{ isset($datosfood['servings']['serving'][0]['vitamin_c']) ? $datosfood['servings']['serving'][0]['vitamin_c'] : 'N/A' }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </fieldset>
            </div>

        </div>
    </div>
@endsection
