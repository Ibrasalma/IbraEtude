<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('/') }}" target="_blank">Visit Site</a></li>        
          		<li class="nav-item dropdown">
            		<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              			<i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
            		</a>
            		<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              			<li class="nav-item dropdown-header">
                			<a href="#"><i class="glyphicon glyphicon-eye-open"></i> profile</a>
             	 		</li>
             	 		<li class="divider"></li>
              			<li class="nav-item {{ set_active_route('lougout') }}">
                			<a class="dropdown-item" href="#"><i class="glyphicon glyphicon-log-out"></i> Link
                			</a>
              			</li>
              			<li class="nav-item {{ set_active_route('lougout') }}">
                			<a class="dropdown-item" href="#"><i class="glyphicon glyphicon-log-out"></i> Link
                			</a>
              			</li>
              			<li class="nav-item {{ set_active_route('lougout') }}">
                			<a class="dropdown-item" href="#"><i class="glyphicon glyphicon-log-out"></i> Link
                			</a>
              			</li>
            		</ul>
          		</li>
       	 	</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>