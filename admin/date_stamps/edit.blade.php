@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Edit Date Stamp</h1>

            <form method="POST" action="/admin/date_stamps/{{ $dateStamp->id }}">
                @csrf
                @method('PUT')

                <div class="field">

                    <label class="label" for="name">Variation</label>

                    <div class="control">

                        <input class="input" type="text" name="variation_list_id" id="variation_list_id" value="{{$dateStamp->variation_list_id}}">

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="date_stamp">Date Stamp</label>

                    <div class="control">

                        <input class="input" type="text" name="date_stamp" id="date_stamp" value="{{$dateStamp->date_stamp}}">

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
