@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('users.store') }}" method="POST">
	          			{{ csrf_field() }}
	             		@include('admin.users._form',['formSubmitionText'=>'Créer un user'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	</div>
</div>	

@stop