@extends('layouts.default',['title'=>'Home'])

<link rel="stylesheet" type="text/css" href="{{ asset('/css/forum.css') }}">

@section('content')
	
@include('layouts.partials._carousel')
	<section class="icono-color">
		<article class="container">
			<div class="row">
				<div class="icono-content">
					<ul class="icono-ul">
						<li class="col-md-2 col-sm-2 col-xs-4">
							<a href="#">
								<div class="icono-info">
									<i class="fa fa-flag"></i>
									<p class="h5">ETAPE 1</p>
									<p class="p">Crée et connecte toi</p>
								</div>
							</a>
						</li>
						<li class="col-md-2 col-sm-2 col-xs-4">
							<a href="#">
								<div class="icono-info">
									<i class="fa fa fa-book"></i>
									<p class="h5">ETAPE 2</p>
									<p class="p">Recherche bourse </p>
								</div>
							</a>
						</li>
						<li class="col-md-2 col-sm-2 col-xs-4"> 
							<a href="#">
								<div class="icono-info">
									<i class="fa fa-trophy"></i>
									<p class="h5">ETAPE 3</p>
									<p class="p">Complete formulaire</p>
								</div>
							</a>
						</li>
						<li class="col-md-2 col-sm-2 col-xs-4">
							<a href="#">
								<div class="icono-info">
									<i class="fa fa-group"></i>
									<p class="h5">ETAPE 4</p>
									<p class="p">Paye les frais</p>
								</div>
							</a>
						</li>
						<li class="col-md-2 col-sm-2 col-xs-4">
							<a href="#">
								<div class="icono-info">
									<i class="fa fa-legal"></i>
									<p class="h5">ETAPE 5</p>
									<p class="p">Attend resultats</p>
								</div>
							</a>
						</li>
						<li class="col-md-2 col-sm-2 col-xs-4">
							<a href="#">
								<div class="icono-info">
									<i class="fa fa-legal"></i>
									<p class="h5">ETAPE 6</p>
									<p class="p">Payer les services</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</article>
	</section>
	<div class="container">
		<div class="row">
			<div class="tl-section-title clearfix style-1 text-center show-under_line dark " style="margin-bottom: 20px;">
                <h1 class="gallery-title">Rechercher & Appliquer pour une <span class="main-color">Bourse</span><span class="under-line star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span></h2>
            </div>
			@include('pages._scholarship')
		</div>
	</div>
    <dv class="container">	
		@include('layouts.partials._service')
	</div>
	<div class="container">
		<div class="row">
			<link rel="stylesheet" href="{{ asset('/css/galerie.css') }}">
			<section class="portfolio" id="portfolio">
			    <div class="container-fluid">
			        <div class="row">

			            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                <h1 class="gallery-title">Les universités chinoises</h1>
			            </div>

			            <div align="center">
			                <button class="filter-button" data-filter="all">Tous</button>
			                <button class="filter-button" data-filter="Nanjing">Nanjing</button>
			                <button class="filter-button" data-filter="Hangzhou">Hangzhou</button>
			                <button class="filter-button" data-filter="Hinhua">Jinhua</button>
			                <button class="filter-button" data-filter="Beijing">Beijing</button>
			                <button class="filter-button" data-filter="Shanghai">Shanghai</button>
			                <button class="filter-button" data-filter="Guangzhou">Guangzhou</button>
			                <button class="filter-button" data-filter="Tianjin">Tianjin</button>
			            </div>
			            
			            <br/>
						@include('layouts.partials._galerie',['ville'=>'Nanjing'])
						@include('layouts.partials._galerie',['ville'=>'Hangzhou'])
						@include('layouts.partials._galerie',['ville'=>'Jinhua'])
						@include('layouts.partials._galerie',['ville'=>'Beijing'])
						@include('layouts.partials._galerie',['ville'=>'Shanghai'])
						@include('layouts.partials._galerie',['ville'=>'Guangzhou'])
						@include('layouts.partials._galerie',['ville'=>'Tianjin'])
					</div>
    			</div>
			</section>
		</div>
	</div>
	<script src="https://use.fontawesome.com/1dec14be15.js"></script> 
@stop