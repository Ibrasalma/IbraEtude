@extends('admin.layouts.application',['title'=>'Programme_creation'])

@section('content')

@include('flashy::message')
@if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>
    </div>

@endif

<div class="container">
	<div class="row">
		<div class="col-md-10">
	       	<table class="table table-striped">
	          	<tbody>

	          		<form action="{{ route('avatars.store') }}" class="form-horizontal form-bordered" id="upload-contacts" method="post" enctype="multipart/form-data">
	          			{{ csrf_field() }}
	             		@include('admin.users.avatar._form',['formSubmitionText'=>'Créer un avatar'])
	             	</form>

	             	<div >
	             		<a class="btn btn-success" href="{{ route('avatars.index') }}">Liste des avatars</a>
	             	</div>
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
	</div>
</div>

@stop