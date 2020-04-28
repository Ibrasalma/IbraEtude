@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')
<div class="col-md-10 content">
   	<table class="table table-striped">
	   	<tbody>
	        <form action="{{ route('bourses.store') }}" method="POST">
	          	{{ csrf_field() }}
	          	@include('admin.bourses._form',['formSubmitionText'=>'Créer une bourse'])
	        </form>
	    </tbody>
	</table>
</div>
@stop