@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationBackCode->id }}/edit">Edit Back View Code</a></h1>
			<div class="title">
				<h2>ID: {{ $variationBackCode->id}}</h2>
			</div>

            {{ $variationBackCode->back_view_code . " - " . $variationBackCode->name }}

			</div>
		
</div>

@endsection