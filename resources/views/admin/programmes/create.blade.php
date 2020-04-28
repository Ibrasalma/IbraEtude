@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')
<div class="col-md-10">
	<table class="table table-striped">
	    <tbody>
	        <form action="{{ route('programmes.store') }}" method="POST">
	          	{{ csrf_field() }}
	      		@include('admin.programmes._form',['formSubmitionText'=>'Créer un programme'])
	       	</form>
	   	</tbody>
    </table>
</div>
@stop