@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Back Name</h1>

            <form method="POST" action="/admin/date_stamps">
                @csrf

                <div class="field">

                    <label class="label" for="variation_list_id">Variation</label>

                        <div class="select is-multiple control">

                           <select
                            name="variation_list_id"
                            >

                            @foreach ($variation_lists as $variation_list)
                                <option value="{{ $variation_list->id }}">{{ $variation_list->id }}</option>
                            @endforeach

                            </select>

                            @error('variation_lists_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="date_stamp">Date Stamp</label>

                    <div class="control">

                        <input
                            class="input @error('date_stamp') is-danger @enderror }}"
                            name="date_stamp"
                            id="date_stamp">
                            {{ old('date_stamp') }}


                        @error('date_stamp')
                            <p class="help is-danger">{{ $errors->first('date_stamp')}}</p>
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
