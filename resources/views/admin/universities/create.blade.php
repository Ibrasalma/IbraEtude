@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

<div class="col-md-10 content">
	<table class="table table-striped">
	    <tbody>
	        <form action="{{ route('universities.store') }}" method="POST" name="frm">
	          	{{ csrf_field() }}
	            @include('admin.universities._form',['formSubmitionText'=>'Créer une université'])
	        </form>
	    </tbody>
	</table>
</div>	

@stop