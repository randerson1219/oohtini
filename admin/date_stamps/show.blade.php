@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $dateStamp->id }}/edit">Edit Date Stamp</a></h1>
			<div class="title">
				<h2>ID: {{ $dateStamp->id}}</h2>
			</div>

            {{ $dateStamp->variation_lists_id . " - " . $dateStamp->date_stamp }}

			</div>
		
</div>

@endsection