@extends ('layouts.master')

@section ('content')

<div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">Edit Back Name</h1>

            <form method="POST" action="/admin/variations/variation_back_names/{{ $variationBackName->id }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="back_view_code">Back View Code</label>
                        <div class="select is-multiple control">
                            <select name="back_view_code_id">
                                @foreach ($variation_back_codes as $back_view_code)
                                    <option value="
                                        {{ $back_view_code->id }}"
                                        {{ ($variationBackName->back_view_code_id==$back_view_code->id) ? 'selected':''}}>
                                        {{$back_view_code->id . ' - ' . $back_view_code->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="select is-multiple control">
                        <select name="title_id">
                            @foreach ($titles as $title)
                                <option value="
                                        {{ $title->id }}"
                                    {{ ($variationBackName->title_id==$title->id) ? 'selected':''}}>
                                    {{$title->id . ' - ' . $title->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="select is-multiple control">
                        <select name="description_id">
                            @foreach ($descriptions as $description)
                                <option value="
                                        {{ $description->id }}"
                                    {{ ($variationBackName->description_id==$description->id) ? 'selected':''}}>
                                    {{$description->id . ' - ' . $description->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="position">Position</label>
                    <div class="select is-multiple control">
                        <select name="position_id">
                            @foreach ($positions as $position)
                                <option value="
                                        {{ $position->id }}"
                                    {{ ($variationBackName->position_id==$position->id) ? 'selected':''}}>
                                    {{$position->id . ' - ' . $position->name  }}</option>
                            @endforeach
                        </select>
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
