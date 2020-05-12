@extends('layouts.default',['title'=>'Home'])

@section('content')

<div class="flex-center position-ref full-height">
	<div id="message"></div>
	<form id="form-data" data-route="{{ route('post_path') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="nom" class="label-control">Name:</label>
			<input type="text" id="nom" name="nom" class="form-control">
		</div>
		<div class="form-group">
			<label for="email" class="label-control">Email:</label>
			<input type="email" id="nom" name="email" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="Soumettre" class="btn btn-warning form-control">
		</div>
	</form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#form-data').submit(function(e){
			var route = $('#form-data').data('route');
			var form_data = $(this);
			
			$.ajax({
				type : 'POST',
				url : route,
				data : form_data.serialize(),
				success : function(Response) {
					console.log(Response);
					if(Response.success){
						$('#message').append('<p class="alert">'+Response.success+'</p>');
					}
					
				}
			});

			e.preventDefault();
		});
	});
</script>
@stop