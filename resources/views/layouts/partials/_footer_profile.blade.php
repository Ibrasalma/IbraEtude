<style>
	.footer {
  	background-color: #f5f5f5;
}

</style>
<footer class="footer mt-auto py-3">
	
  	<div class="container text-center">
  		<div class="row">
	  		<div class="col-md-6">
				<a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Home</a>
				<a href="{{ url('/about') }}"><i class="fa fa-link"></i> Privacy Policy</a>
				<a href="{{ url('/contact') }}"><i class="fa fa-envelope fa-fw"></i> Contact Us</a>
				<a href="{{ url('/bourse/liste') }}"><i class="glyphicon glyphicon-eye-open"></i> Bourses</a>
			</div>
			<div class="col-md-6">
		    	&copy; {{ date('Y') }} &middot; {{ config('app.name') }} fièrement développé par <a href="http://twitter.com/ibrasalma" target="_blank">@ibrasalma</a>
			</div> 
  		</div>	
  	</div>
</footer>