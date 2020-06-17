@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="has-text-weight-bold is-size-4">New Series</h1>

            <form method="POST" action="/admin/series">
                @csrf

                <div class="field">

                    <label class="label" for="name">Series Name</label>

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

                <div class="field">

                    <label class="label" for="acronym">Series Acronym</label>

                    <div class="control">

                        <input 
                            class="input @error('acronym') is-danger @enderror }}" 
                            type="text" 
                            name="acronym" 
                            id="acronym" 
                            value="{{ old('acronym') }}"
                            requried>
                        
                        @error('name')
                            <p class="help is-danger">{{ $errors->first('acronym')}}</p>
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