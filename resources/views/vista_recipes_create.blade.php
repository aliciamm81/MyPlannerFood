@extends('layouts.base')

@section('content')
    @parent

    <div class="container">
        <div class="col-md-12">
            <div class="mb-12">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Create your Recipe</h3>
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                <h4>An internal message has occurred. Please contact the administrator</h4>
                            </div>
                        @endif
                        <form method="get" action="{{ route('recipes/save') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label for="cantidad" class="form-label">Name </label>
                                <input type="text" class="form-control" maxlength="100" name="name"
                                    placeholder="Enter the name of the recipe">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description </label>
                                <input type="text" class="form-control" name="description" maxlength="100" step=".01"
                                    placeholder="description">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ingredient" class="form-label">Ingredient </label>
                                <textarea type="text" class="form-control" name="ingredient" maxlength="1000" style="height: 100px"
                                    placeholder="ingredient"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="steps" class="form-label">Steps </label>
                                <textarea type="text" class="form-control" name="steps" maxlength="2000" style="height: 100px"
                                    placeholder="ingredient"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="calories" class="form-label">Time </label>
                                <input type="text" class="form-control" name="time" maxlength="4" step=".01"
                                    placeholder="time">
                            </div>
                            <div class="form-group mb-3">
                                <label for="calories" class="form-label">Calories </label>
                                <input type="text" class="form-control" name="calories" maxlength="4" step=".01"
                                    placeholder="calories">
                            </div>

                            <div class="form-group mb-3">
                                <label for="carbohydrate" class="form-label">Carbohydrate </label>
                                <input type="text" class="form-control" name="carbohydrate" maxlength="4" step=".01"
                                    placeholder="carbohydrate">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fat" class="form-label">Fat </label>
                                <input type="text" class="form-control" name="fat" step=".01" maxlength="4"
                                    placeholder="fat">
                            </div>
                            <div class="form-group mb-3 ">
                                <label for="protein" class="form-label">Protein </label>
                                <input type="text" class="form-control" name="protein" maxlength="4" step=".01"
                                    placeholder="protein">
                            </div>
                            <div class="form-group mb-4">

                                <input type="file" class="form-label" name="imagen">

                            </div>

                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        @endsection
