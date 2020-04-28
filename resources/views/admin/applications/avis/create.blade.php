@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

@include('flashy::message')
@if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>
    </div>

@endif

		<div class="col-md-10 content">
	       	<table class="table table-striped">
	          	<tbody>

	          		<form action="{{ route('avis.store') }}" class="form-horizontal form-bordered" id="upload-contacts" method="post" enctype="multipart/form-data">
	          			{{ csrf_field() }}
	             		@include('admin.applications.avis._form',['formSubmitionText'=>'Créer un avis'])
	             	</form>
	          	</tbody>
	       	</table>	
		</div>
	

@stop