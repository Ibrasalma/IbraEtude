
<div class="col-md-2 sidebar">
  	<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
		<div class="absolute-wrapper"></div>
		<!-- Menu -->
		<div class="side-menu">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Main Menu -->
				<div class="side-menu-container">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-plane"></span> Journalier</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Montly</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Yearly</a></li>

						<!-- Dropdown-->
						<li class="panel panel-default" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl1">
								<span class="glyphicon glyphicon-user"></span> Database <span class="caret"></span>
							</a>

							<!-- Dropdown level 1 -->
							<div id="dropdown-lvl1" class="panel-collapse collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li><a href="{{ route('contact.index') }}">Messages de contact</a></li>
										<li><a href="{{ route('bourses.index') }}">Bourses</a></li>
										<li><a href="{{ route('droits.index') }}">Droits</a></li>
										<li><a href="{{ route('programmes.index') }}">Programmes</a></li>

									<!-- Dropdown level 2 -->
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lvl2">
												<span class="glyphicon glyphicon-off"></span> Utilisateurs <span class="caret"></span>
											</a>
											<div id="dropdown-lvl2" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="{{ route('users.index') }}">Liste</a></li>
														<li><a href="{{ route('avatars.index') }}">Avatars</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lv22">
												<span class="glyphicon glyphicon-off"></span> Universités <span class="caret"></span>
											</a>
											<div id="dropdown-lv22" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="{{ route('universities.index') }}">Liste</a></li>
														<li><a href="{{ route('galeries.index') }}">Galerie</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lv23">
												<span class="glyphicon glyphicon-off"></span> Applications <span class="caret"></span>
											</a>
											<div id="dropdown-lv23" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="{{ route('applications.index') }}">Liste</a></li>
														<li><a href="{{ route('autres.index') }}">Autres docs</a></li>
														<li><a href="{{ route('avis.index') }}">Avis</a></li>
														<li><a href="{{ route('banks.index') }} ">Bank</a></li>
														<li><a href="{{ route('diplomes.index') }} ">Diplomes translate</a></li>
														<li><a href="{{ route('degrees.index') }} ">Diplomes originaux</a></li>
														<li><a href="{{ route('langues.index') }} ">Langues</a></li>
														<li><a href="{{ route('letter1s.index') }} ">Letter1</a></li>
														<li><a href="{{ route('letter2s.index') }} ">Letter2</a></li>
														<li><a href="{{ route('medicals.index') }} ">Medicals</a></li>
														<li><a href="{{ route('criminals.index') }} ">Non Criminal</a></li>
														<li><a href="{{ route('passeports.index') }} ">Passeport</a></li>
														<li><a href="{{ route('photos.index') }} ">Photo</a></li>
														<li><a href="{{ route('plans.index') }} ">Study Plan</a></li>
														<li><a href="{{ route('releves.index') }}">Transcripts originaux</a></li>
														<li><a href="{{ route('transcripts.index') }} ">Transcripts translate</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lv24">
												<span class="glyphicon glyphicon-off"></span> Etudiants <span class="caret"></span>
											</a>
											<div id="dropdown-lv24" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="{{ route('stories.index') }}">Liste</a></li>
														<li><a href="#">Background</a></li>
														<li><a href="#">Strory</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lv25">
												<span class="glyphicon glyphicon-off"></span> Blog <span class="caret"></span>
											</a>
											<div id="dropdown-lv25" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="#">Liste</a></li>
														<li><a href="#">Categories</a></li>
														<li><a href="#">Commentaires</a></li>
														<li><a href="#">Media</a></li>
														<li><a href="#">Likes</a></li>
														<li><a href="#">Postes</a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

		</div>
	</div>
</div>
