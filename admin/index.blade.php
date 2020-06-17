@extends ('layouts.master')

@section ('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div class="admin-box-container">
                @foreach ($files as $file)
                        <a href="/admin/{{ $file }}">
                            <div class="admin-box-display shadow">
                                <span class="admin-box-display-category">
                                    {{ ucwords(str_replace(['-', '_'], ' ', $file)) }}
                                </span>
                            </div>
                        </a>
                @endforeach
            </div>
        </div>

@endsection
