@extends('layout.app')
@section('content')
<div class="container main">
    <div class="row col-md-6 col-sm-6 col-xs-12">
        <form method="POST" action="{{ url('parse') }}">

       		{{ csrf_field() }}
            <div class="form-group ">
                <label class="control-label requiredField" for="html-raw">HTML<span class="asteriskField">*</span></label>
                <textarea class="form-control" cols="40" id="html-raw" name="html-raw" placeholder="Paste HTML here." rows="10"></textarea>
            </div>
            <div class="form-group ">
                <label class="control-label ">Check all tags that should be kept</label>
                
                @include('forms.partials.tags')

            </div>
            <div class="form-group col-md-12">
                <div>
                    <button class="btn btn-primary " name="submit" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
