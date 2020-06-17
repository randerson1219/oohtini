@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationBackTitle->id }}/edit">Edit Back Title</a></h1>
			<div class="title">
				<h2>ID: {{ $variationBackTitle->id}}</h2>
			</div>

            {{  $variationBackTitle->name }}

			</div>
		
</div>

@endsection