@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

@include('flashy::message')
@if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>
    </div>

@endif

		<div class="col-md-10 content">
	       	<table class="table table-striped">
	          	<tbody>

	          		<form action="{{ route('avis.update',$avi->id) }}" method="post">
	          			{{ csrf_field() }}
	          			{{ method_field('PUT') }}
	             		@include('admin.applications.avis._form',['formSubmitionText'=>'Modifier un avis'])
	             	</form>
	          	</tbody>
	       	</table>	
		</div>
	

@stop