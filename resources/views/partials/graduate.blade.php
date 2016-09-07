<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3>Graduate</h3></div>
@if (count($graduate) > 0)		
	  <!-- Table -->
	  <table class="table">
	    <thead>
	    	<th>ID</th>
	    	<th>Catalog Year</th>
	    	<th>Created On</th>
	    	<th></th>
	    </thead>
	    <tbody>
	    	@foreach ($graduate as $grad)	
	    		<tr>
	    			<td>{{ $grad->id }}</td>
	    			<td>{{ $grad->start_year }}-{{ $grad->start_year + 1 }}</td>
	    			<td>{{ $grad->created_at }}</td>
	    			<td>
						<div class="btn-group pull-right">
						  <a type="button" href="{{ url($grad->id) }}" target="_blank" class="btn home btn-primary">View</a>
						  <a type="button" class="btn home btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </a>
						  <ul class="dropdown-menu">
						    <li><a target="_blank" href="{{ url($grad->id) }}?view=html">View HTML</a></li>
						    <li><a target="_blank" href="{{ url($grad->id) }}?view=raw">View Raw HTML</a></li>
						  </ul>
						</div>
	    			</td>
	    		</tr>
	    	@endforeach
	    </tbody>
	  </table>
@else 
	<div class="panel-body"><h5>There are currently no Graduate catalogs.</h5></div>
@endif
</div>