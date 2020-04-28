@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('applications.update',$application->id) }}" method="POST">
	          			{{ csrf_field() }}
	          			{{ method_field('PUT') }}
	             		@include('admin.applications._form',['formSubmitionText'=>'Modifier une application'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	</div>
</div>	

@stop