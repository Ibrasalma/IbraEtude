@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

		<div class="col-md-10 content">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('applications.store') }}" method="POST">
	          			{{ csrf_field() }}
	             		@include('admin.applications._form',['formSubmitionText'=>'Créer une application'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	

@stop