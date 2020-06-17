@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Region</h1>

            <form method="POST" action="/admin/regions">
                @csrf

                <div class="field">

                    <label class="label" for="name">Region Name</label>

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