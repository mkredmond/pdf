<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3>Undergraduate</h3></div>
@if (count($undergraduate) > 0)		
	  <!-- Table -->
	  <table class="table">
	    <thead>
	    	<th>Name</th>
	    	<th>Catalog Year</th>
	    	<th class="visible-md visible-lg">Created On</th>
	    	<th></th>
	    </thead>
	    <tbody>
	    	@foreach ($undergraduate as $ugrad)	
	    		<tr>
	    			<td>{{ ucwords($ugrad->name) }}</td>
	    			<td>{{ $ugrad->start_year }}-{{ $ugrad->start_year + 1 }}</td>
	    			<td class="visible-md visible-lg">{{ $ugrad->created_at->toDayDateTimeString() }}</td>
	    			<td>
	    				<div class="btn-group pull-right">
						  <a type="button" href="{{ url($ugrad->id) }}" target="_blank" class="btn home btn-primary">View</a>
						  <a type="button" class="btn home btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </a>
						  <ul class="dropdown-menu">
						    <li><a target="_blank" href="{{ url($ugrad->id) }}?view=html">View HTML</a></li>
						    <li><a target="_blank" href="{{ url($ugrad->id) }}?view=raw">View Raw HTML</a></li>
						  </ul>
						</div>
	    			</td>
	    		</tr>
	    	@endforeach
	    </tbody>
	  </table>
@else 
	<div class="panel-body"><h5>There are currently no Undergraduate catalogs.</h5></div>
@endif
</div>