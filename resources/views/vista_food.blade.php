@extends('layouts.base')

@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="row col-md-8">
                <form>
                    <fieldset>
                        <h3>Foods</h3>


                        <form class="d-flex " method="get" action="{{ route('food') }}">
                            <div class="row mb-4 mt-3 gx-1">
                                <div class="col-md-8">
                                    <input class="form-control me-5" type="text" placeholder="Search food"
                                        aria-label="Search" name="searchFood">
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-outline-success" type="submit" name="action"
                                        value="search">Search</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class=" h4"> Id </th>
                                    <th scope="col" class=" h4"> Name</th>
                                    <th scope="col" class=" h4"> Type </th>

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
