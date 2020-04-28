@extends('admin.layouts.application',['title'=>'Droit_creation'])

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('droits.store') }}" method="POST">
	          			{{ csrf_field() }}
	             		@include('admin.droits._form',['formSubmitionText'=>'Créer un droit'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	</div>
</div>	

@stop