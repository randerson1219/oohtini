@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Update Series</h1>

            <form method="POST" action="/admin/series/{{ $series->id }}">
                @csrf
                @method('PUT')

                <div class="field">

                    <label class="label" for="name">Series Name</label>


                    <div class="control">

                        <input class="input" type="text" name="name" id="name" value="{{$series->name}}">

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="acronym">Series Acronym</label>

                    <div class="control">

                        <textarea class="textarea" name="acronym" id="acronym">{{$series->acronym}}</textarea>
                    
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