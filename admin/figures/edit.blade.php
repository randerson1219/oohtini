@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Update Figure</h1>

            <form method="POST" action="/admin/figures/{{ $figure->id }}">

                @csrf
                @method('PUT')

                <div class="field">

                    <label class="label" for="reference">Reference</label>


                    <div class="control">

                        <input class="input" type="text" name="reference" id="reference" value="{{$figure->reference}}">

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="name">Name</label>

                    <div class="control">

                        <textarea class="textarea" name="name" id="name">{{$figure->name}}</textarea>

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="series_id">Series</label>

                        <div class="select is-multiple control">

                           <select
                            name="series_id"
                            >

                            @foreach ($series as $series)
                                <option value="
                                    {{ $series->id }}"
                                    {{ ($figure->series_id==$series->id) ? 'selected':''}}>
                                    {{ $series->name }}</option>
                            @endforeach

                            </select>

                            @error('series_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

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
