@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Figure</h1>

            <form method="POST" action="/admin/figures">
                @csrf

                <div class="field">

                    <label class="label" for="reference">Reference</label>

                    <div class="control">

                        <input
                            class="input @error('reference') is-danger @enderror }}"
                            name="reference"
                            id="reference">
                            {{ old('reference') }}


                        @error('reference')
                            <p class="help is-danger">{{ $errors->first('reference')}}</p>
                        @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="name">Name</label>


                    <div class="control">

                        <input
                            class="input @error('name') is-danger @enderror }}"
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            requried>

                        @error('name')
                            <p class="help is-danger">{{ $errors->first('name')}}</p>
                        @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="series_id">Series</label>

                        <div class="select is-multiple control">

                           <select
                            name="series_id"
                            >

                            @foreach ($series as $series)
                                <option value="{{ $series->id }}">{{ $series->name }}</option>
                            @endforeach

                            </select>

                            @error('series_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                    </div>

                </div>




                <div class="field is-grouped">

                    <div class="control">

                        <button class="button is-link" type="submit">Create</button>

                    </div>

            </form>

        </div>

    </div>

@endsection
