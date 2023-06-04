@extends('layouts.base')

@section('content')
    @parent

    <div class="container">

        <h1>Create Menu</h1>
        @if (Session::has('error'))
            <div class="alert alert-danger">
                <h4>An internal message has occurred. Please contact the administrator</h4>
            </div>
        @endif
        <form class=" mt-4" method="get" action="{{ route('menu') }}">
            @csrf
            <table>
                <div class="row gx-1 "style="margin-bottom:100px">
                    <div class="col-md-3 ">

                        <input class="form-control " type="text" placeholder="Search recipe" aria-label="Search"
                            name="searchRecipe">

                    </div>
                    <div class="col-md-1">

                        <button class="btn btn-outline-success" type="submit" name="action" value="search">Search</button>

                    </div>
                    <div class="col-md-2 ">

                        <select class="form-select " aria-label="Default select example" name="selectRecipe"
                            id="selectRecipe">
                            <option selected></option>
                            @isset($recipeList)
                                @foreach ($recipeList as $receta)
                                    <option value="{{ $receta['recipe_id'] }}:{{ $receta['recipe_name'] }}">
                                        {{ $receta['recipe_name'] }}</option>
                                @endforeach
                            @endisset
                        </select>


                    </div>
                    <div class="col-md-2 ">

                        <select class="form-select" aria-label="Default select example" name="selectFranja"
                            id="selectFranja">

                            <option selected value="1">Breakfast</option>
                            <option value="2">Lunch</option>
                            <option value="3">Snack</option>
                            <option value="4">Dinner</option>
                        </select>


                    </div>
                    <div class="col-md-3 ">

                        <button class="btn btn-outline-success" type="submit" name="action" value="add">Add</button>

                    </div>
                </div>

            </table>


        </form>
        <div class="col-md-16   ">
            <div class="row ">
                <form class="d-flex" method="get" action="{{ route('menu/save') }}">

                    <table class="  me-4">


                        <tr>
                            <td> <select class="form-select" aria-label="Default select example" id="menuName"
                                    name="menuName">

                                    <option selected value="Week1">Week1</option>
                                    <option value="Week2">Week2</option>
                                    <option value="Week3">Week3</option>
                                    <option value="Week4">Week4</option>
                                    <option value="Week5">Week5</option>
                                    <option value="Week6">Week6</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <select class="form-select" aria-label="Default select example" id="selectDay1"
                                    name="day">

                                    <option selected value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select></td>
                        </tr>

                    </table>

                    <table>
                        <tr>
                            <td><input class="form-control text-center" type="text" id="labelBreakfast" value="Breakfast"
                                    name="labelBreakfast" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedBreakfast_id"
                                    value="{{ Session::get('selectedBreakfast_id') }}" name="selectedBreakfast_id" readonly>
                            </td>

                            <td><input class="form-control" type="text" id="selectedBreakfast"
                                    value="{{ Session::get('selectedBreakfast') }}" name="selectedBreakfast" readonly>
                            </td>

                        </tr>
                        <tr>
                            <td><input class="form-control text-center" type="text" id="labelLunch" value="Lunch"
                                    name="labelLunch" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedLunch_id"
                                    value="{{ Session::get('selectedLunch_id') }}" name="selectedLunch_id" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedLunch"
                                    value="{{ Session::get('selectedLunch') }}" name="selectedLunch" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-control text-center" type="text" id="labelSnack" value="Snack"
                                    name="labelSnack" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedSnack_id"
                                    value="{{ Session::get('selectedSnack_id') }}" name="selectedSnack_id" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedSnack"
                                    value="{{ Session::get('selectedSnack') }}" name="selectedSnack" readonly>
                            </td>

                        </tr>
                        <tr>
                            <td><input class="form-control text-center" type="text" id="labelDinner" value="Dinner"
                                    name="labelDinner" readonly>
                            </td>
                            <td><input class="form-control" type="text" id="selectedDinner_id"
                                    value="{{ Session::get('selectedDinner_id') }}" name="selectedDinner_id" readonly>
                            <td><input class="form-control" type="text" id="selectedDinner"
                                    value="{{ Session::get('selectedDinner') }}" name="selectedDinner" readonly>
                            </td>

                        </tr>
                    </table>


                    <button class="btn btn-outline-success" type="submit">Save</button>

                </form>

            </div>
        </div>
    </div>
@endsection
