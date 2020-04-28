@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')
<div class="col-md-10 content">
	<table class="table table-striped">
	    <tbody>
	        <form action="{{ route('universities.update',$university->id) }}" method="POST">
	          	{{ csrf_field() }}
	          	{{ method_field('PUT') }}
	            @include('admin.universities._form',['formSubmitionText'=>'Modifier une university'])
	        </form>
	    </tbody>
	</table>
</div>

@stop