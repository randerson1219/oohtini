@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Back Name</h1>

            <form method="POST" action="/admin/variations/variation_back_names">
                @csrf

                <div class="field">

                    <label class="label" for="back_view_code_id">Back View Code</label>

                        <div class="select is-multiple control">

                           <select
                            name="back_view_code_id"
                            >
                            
                            @foreach ($variation_back_codes as $variation_back_code)
                                <option value="{{ $variation_back_code->id }}">{{ $variation_back_code->back_view_code }}</option>
                            @endforeach
                            
                            </select>

                            @error('back_view_code_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="title_id">Back Description Title</label>

                        <div class="select is-multiple control">

                           <select
                            name="title_id"
                            >
                            
                            @foreach ($titles as $title)
                                <option value="{{ $title->id }}">{{ $title->name }}</option>
                            @endforeach
                            
                            </select>

                            @error('title_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="description_id">Back Description Name</label>

                        <div class="select is-multiple control">

                           <select
                            name="description_id"
                            >
                            
                            @foreach ($descriptions as $description)
                                <option value="{{ $description->id }}">{{ $description->name }}</option>
                            @endforeach
                            
                            </select>

                            @error('description_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                    </div>

                </div>

                <div class="field">

                    <label class="label" for="position_id">Back Position Name</label>

                        <div class="select is-multiple control">

                           <select
                            name="position_id"
                            >
                            
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                            
                            </select>

                            @error('position_id')
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