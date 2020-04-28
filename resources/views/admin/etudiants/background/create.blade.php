@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="#" method="">
	          			{{ csrf_field() }}
	             		@include('admin.layouts._form_programmes',['formSubmitionText'=>'Créer un programme'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	</div>
</div>	

@stop