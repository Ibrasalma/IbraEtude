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
	          	<form action="{{ route('galeries.update',$galery) }}" id="upload-contacts" method="POST" enctype="multipart/form-data">
	          		{{ csrf_field() }}
                    {{ method_field('PUT') }}
	             	@include('admin.universities.galeries._form',['formSubmitionText'=>'Modifier une galerie'])
	            </form>
	        </tbody>
	    </table>
	    @if (count($errors) > 0)
        	<div class="alert alert-danger">
            	<strong>Whoops!</strong> There were some problems with your input.<br><br>
            	<ul>
                	@foreach ($errors->all() as $error)
                    	<li>{{ $error }}</li>
                	@endforeach
            	</ul>
        	</div>
    	@endif	
	</div>	
@stop