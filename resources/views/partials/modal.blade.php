<div class="modal fade create-pdf-modal" tabindex="-1" role="dialog" aria-labelledby="createPdfModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	 	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"></h4>
      	</div>
      	<section class="modal-body">
      		<form action="/" id="create-pdf-form">
      	
		      	<div class="form-group col-md-12">
		      		<label for="catalog-name">Catalog Name</label>
		      		<input type="text" name="catalog-name" id="catalog-name" class="form-control" value="Catalog">
		      	</div>

		      	<div class="form-group col-md-12">
		      		<label for="catalog-year">Catalog Year</label>
		      		<select name="catalog-year" id="catalog-year" class="form-control" value="{{ old('catalog-year') }}">
		      			@foreach ($availableCatalogYears as $year)
		      				<option value="{{ $year->start_year }}" selected="">{{ $year->start_year }}-{{ $year->start_year + 1 }}</option>
		      			@endforeach
		      		</select>
		      	</div>

	      		<div class="form-group text-center">
	      			<button class="btn btn-primary create-pdf" type="submit">Create PDF</button>
	      		</div>
	      	</form>
      	</section>
    </div>
  </div>
</div>