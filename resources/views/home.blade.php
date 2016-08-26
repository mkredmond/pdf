@extends('layout.app')
@section('content')
	<main id="welcome">
		<div class="main text-center container">
			<span class="col-md-6"><a data-toggle="modal" data-target=".create-pdf-modal" id="sgc" class="btn btn-lg btn-block btn-primary">Create Graduate Catalog</a></span>
			<span class="col-md-6"><a data-toggle="modal" data-target=".create-pdf-modal" id="suc" class="btn btn-lg btn-block btn-default">Create Undergraduate Catalog</a></span>

			<div class="pointer text-center">
				<a href="#catalogs">
					<span>See below for historical catalogs</span>
					<p>
						<i style="font-size:40px;" class="fa fa-chevron-down" aria-hidden="true"></i>
					</p>
				</a>
			</div>
		</div>
	</main>

	<section id="catalogs" class="container">
		<div class="col-md-12">
			<h2 class="page-header">Catalogs</h2>
			@include('partials.undergraduate')

			@include('partials.graduate')
		</div>
	</section>

    @include('partials.modal')
@stop