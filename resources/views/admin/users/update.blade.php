@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('users.update',$user->id) }}" method="POST">
	          			{{ csrf_field() }}
	          			{{ method_field('PUT') }}
	             		@include('admin.users._form',['formSubmitionText'=>'Modifier un user'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
	</div>
</div>	

@stop