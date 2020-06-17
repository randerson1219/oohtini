@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">

		<div id="content">
			<h1><a href="{{ $figure->id }}/edit">Edit Figure</a></h1>
			<div class="title">
				<h2>{{ $figure->name}}</h2>
			</div>

            {{ $figure->reference . " - " . $figure->name . " - " . $figure->series->name }}

			</div>

</div>

@endsection
