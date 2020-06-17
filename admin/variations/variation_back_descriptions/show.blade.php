@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationBackDescription->id }}/edit">Edit Back Description</a></h1>
			<div class="title">
				<h2>ID: {{ $variationBackDescription->id}}</h2>
			</div>

            {{  $variationBackDescription->name }}

			</div>
		
</div>

@endsection