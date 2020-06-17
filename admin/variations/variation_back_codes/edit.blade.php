@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Edit Back View Code</h1>

            <form method="POST" action="/admin/variations/variation_back_codes/{{ $variationBackCode->id }}">
                @csrf
                @method('PUT')

                <div class="field">

                    <label class="label" for="name">Back View Code</label>

                    <div class="control">

                        <input class="input" type="text" name="back_view_code" id="back_view_code" value="{{$variationBackCode->back_view_code}}">

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="name">Name</label>

                    <div class="control">

                        <input class="input" type="text" name="name" id="name" value="{{$variationBackCode->name}}">

                    </div>

                </div>

                <div class="field is-grouped">

                    <div class="control">

                        <button class="button is-link" type="submit">Submit</button>

                    </div>

            </form>

        </div>

    </div>


@endsection