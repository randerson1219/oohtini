@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationBackPosition->id }}/edit">Edit Back Position</a></h1>
			<div class="title">
				<h2>ID: {{ $variationBackPosition->id}}</h2>
			</div>

            {{  $variationBackPosition->name }}

			</div>
		
</div>

@endsection