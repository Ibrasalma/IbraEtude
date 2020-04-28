@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')
<div class="col-md-10 content">
   	<table class="table table-striped">
	   	<tbody>
	        <form action="{{ route('bourses.update',$bourse->id) }}" method="POST">
	          	{{ csrf_field() }}
	          	{{ method_field('PUT') }}
	          	@include('admin.bourses._form',['formSubmitionText'=>'Modifier une bourse'])
	        </form>
	    </tbody>
	</table>
</div>
@stop