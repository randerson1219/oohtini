@extends ('layouts.master')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">

			<h1><a href="{{ $variationBackName->id }}/edit">Edit Back Name</a></h1>
			<div>
				<h2>ID: {{ $variationBackName->id}}</h2>
			</div>

            {{   $variationBackName->back_view_code_id . " - " .
                 $variationBackName->title_id . " - " .
                 $variationBackName->description_id . " - " .
                 $variationBackName->position_id
             }}

			</div>

</div>

@endsection
