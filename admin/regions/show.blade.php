@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<h1><a href="{{ $region->id }}/edit">Edit Region</a></h1>
			<div class="title">
				<h2>{{ $region->name}}</h2>
			</div>
		</div>
		
</div>

@endsection