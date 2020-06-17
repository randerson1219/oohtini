@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<h1><a href="{{ $series->id }}/edit">Edit Series</a></h1>
			<div class="title">
				<h2>{{ $series->name}}</h2>
			</div>

            {{ $series->name . " - " . $series->name . " - " . $series->acronym }}

			</div>
		
</div>

@endsection