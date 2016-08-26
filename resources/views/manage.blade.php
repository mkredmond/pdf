@extends('layout.app')

@section('content')
	<main class="container main">
		<article class="columns">
			<a href="#" title="A roll-over will create an exact copy of the most recent year's links and update the year in the URL.">
				<div class="card col-md-3 text-center">
					<p class="card-heading">Roll-over Links</p>
					<span class="card-icon"><i class="fa fa-repeat" aria-hidden="true"></i></span>
				</div>
			</a>
		</article>

		<article class="col-md-12">
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><h3>Links for {{ $links[0]->year }}</h3></div>
				@if (count($links) > 0)		
				  <!-- Table -->
				  <table class="table table-striped">
				    <thead>
				    	<th>URL</th>
				    	<th></th>
				    	<th></th>
				    </thead>
				    <tbody>
				    	@foreach ($links as $link)	
				    		<tr>
				    			<td>{{ $link->url }}</td>
				    			<td><a href="#" class="btn btn-default">Edit</a></td>
				    			<td><a href="#" class="btn btn-danger">Delete</a></td>
				    		</tr>
				    	@endforeach
				    </tbody>
				  </table>
				@else 
				<div class="panel-body"><h5>There are currently no links for this year.</h5></div>
				@endif
			</div>
		</article>
	</main>
@stop