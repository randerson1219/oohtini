@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Update Source</h1>

            <form method="POST" action="/admin/sources/{{ $source->id }}">
                @csrf
                @method('PUT')

                <div class="field">

                    <label class="label" for="name">Source Name</label>


                    <div class="control">

                        <input class="input" type="text" name="name" id="name" value="{{$source->name}}">

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