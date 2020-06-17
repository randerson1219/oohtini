@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Front View Code</h1>

            <form method="POST" action="/admin/variations/variation_front_codes">
                @csrf

                <div class="field">

                    <label class="label" for="front_view_code">Front View Code</label>

                    <div class="control">

                        <input 
                            class="input @error('front_view_code') is-danger @enderror }}" 
                            name="front_view_code" 
                            id="front_view_code">
                            {{ old('front_view_code') }}
                        

                        @error('front_view_code')
                            <p class="help is-danger">{{ $errors->first('front_view_code')}}</p>
                        @enderror
                    
                    </div>

                </div>

                <div class="field">

                    <label class="label" for="name">Name</label>

                    <div class="control">

                        <input 
                            class="input @error('name') is-danger @enderror }}" 
                            name="name" 
                            id="name">
                            {{ old('name') }}
                        

                        @error('name')
                            <p class="help is-danger">{{ $errors->first('name')}}</p>
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