@extends('layouts.base')

@section('content')
    @parent

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Crea tu Menu</h4>
                <form class="d-flex" method="get" action="{{ route('menu') }}">
                    @csrf
                    <div class="col-md-12 mb-4  me-3 ">
                        <table class="table">
                            <tr>

                                <td><input class="form-control " type="text" placeholder="Search recipe"
                                        aria-label="Search" name="searchRecipe">
                                </td>

                                <td>
                                    <button class="btn btn-outline-success" type="submit" name="action"
                                        value="search">Search</button>
                                </td>
                                <td>
                                    <select class="form-select " aria-label="Default select example" name="selectRecipe"
                                        id="selectRecipe">
                                        <option selected></option>
                                        @isset($foodList)
                                            @foreach ($foodList as $receta)
                                                <option value="{{ $receta['recipe_id'] }}:{{ $receta['recipe_description'] }}">
                                                    {{ $receta['recipe_description'] }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </td>


                                <td>
                                    <select class="form-select" aria-label="Default select example" name="selectFranja"
                                        id="selectFranja">

                                        <option selected value="1">Desayuno</option>
                                        <option value="2">Comida</option>
                                        <option value="3">Merienda</option>
                                        <option value="4">Cena</option>
                                    </select>
                                </td>

                                <td>
                                    <button class="btn btn-outline-success" type="submit" name="action"
                                        value="add">Add</button>
                                </td>

                            </tr>
                        </table>
                    </div>
            </div>
        </div>
        </form>
        <div class="col-md-16  ">
            <div class="row ">
                <form class="d-flex" method="get" action="{{ route('menu/save') }}">

                    <table class="  me-4">


                        <tr>
                            <td> <select class="form-select" aria-label="Default select example" id="menuName"
                                    name="menuName">

                                    <option selected value="Semana1">Semana1</option>
                                    <option value="Samana2">Samana2</option>
                                    <option value="Semana3">Semana3</option>
                                    <option value="Semana4">Semana4</option>
                                    <option value="Semana5">Semana5</option>
                                    <option value="Semana6">Semana6</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> <select class="form-select" aria-label="Default select example" id="selectDay1"
                                    name="day">

                                    <option selected value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miercoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select></td>
                        </tr>

                    </table>


                    <table>
                        <tr>
                            <td><input class="form-control text-center" type="text" id="labelBreakfast" value="Desayuno"
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
                            <td><input class="form-control text-center" type="text" id="labelLunch" value="Comida"
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
                            <td><input class="form-control text-center" type="text" id="labelSnack" value="Merienda"
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
                            <td><input class="form-control text-center" type="text" id="labelDinner" value="Cena"
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
    @endsection
