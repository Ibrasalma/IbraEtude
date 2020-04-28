@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

		<div class="col-md-10 content">
	       	<table class="table table-striped">
	          	<tbody>
	          		<form action="{{ route('stories.store') }}" method="POST">
	          			{{ csrf_field() }}
	             		@include('admin.etudiants.stories._form',['formSubmitionText'=>'Créer un etudiant'])
	             	</form>
	          	</tbody>
	       	</table>
		</div>
@stop