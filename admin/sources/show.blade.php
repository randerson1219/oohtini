@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<h1><a href="{{ $source->id }}/edit">Edit Source</a></h1>
			<div class="title">
				<h2>{{ $source->name}}</h2>
			</div>
		</div>
		
</div>

@endsection