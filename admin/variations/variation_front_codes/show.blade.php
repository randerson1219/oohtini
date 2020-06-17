@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationFrontCode->id }}/edit">Edit Front Code</a></h1>
			<div class="title">
				<h2>ID: {{ $variationFrontCode->id}}</h2>
			</div>

            {{ $variationFrontCode->front_view_code . " - " . $variationFrontCode->name }}

			</div>
		
</div>

@endsection