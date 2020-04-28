@extends('layouts.default',['title'=>'Contact'])

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<h2><strong>Contact</strong></h2>
				<p class="text-muted">Si vous avez quelques dificultés, s'il vous plait <a href="mailto:{{ config('ibrahima.admin_support_email') }}">veuillez nous contacter avec ce formulaire</a>. 
				</p>
				<form method="POST" action="{{ route('contact.store') }}">
					@csrf
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					    <label for="name" class="control-label">Name</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name here" required="required" value="{{ old('name') }}" >
					    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					    <label for="email" class="control-label">Email</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email here" required="required" value="{{ old('email') }}" >
					    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
					    <label for="message" class="control-label">Message</label>
					    <textarea name="message" class="form-control" id="message" cols="30" rows="10" required="required">{{ old('message') }}</textarea>
					    {!! $errors->first('message','<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group">
					    <input type="submit" value="Send your query" class="btn btn-primary btn-block" formnovalidate>
					</div>
				</form>
				<hr>
				<div class="text-center">
					<h3>Nos réseaux sociaux</h3>
	                <ul class="list-inline banner-social-buttons">
	                    <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook"> <span class="network-name">Facebook</span></i></a></li>
	                    <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-wordpress"> <span class="network-name">Twitter</span></i></a></li>
	                    <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-youtube-play"> <span class="network-name">Youtube</span></i></a></li>
	                </ul>
				</div>

			</div>
		</div>
	</div>
@endsection