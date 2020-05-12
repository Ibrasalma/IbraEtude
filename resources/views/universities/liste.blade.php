@extends('layouts.default',['title'=>'Bourses'])
@section('content')
<link rel="stylesheet" href="{{ asset('/css/university.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bourse.css') }}">
@include('layouts.partials._tete',['nom'=>'Liste des universités','name'=>'les universités'])
<div class="container-fluid">
	<div class="col-md-9 col-lg-9">
		<div class="row">
		<?php 
            use Illuminate\Support\Str;
        ?>              
        @foreach ($university as $fac)
        <?php
            $image = App\Models\Galerie::where('university_id',$fac->id)->first();
            if(!is_null($image)){
                $image = image($image);
            }else{
            	$image = 'avatars/3.jpg';
            }
        ?>
           	<div class="col-md-4">
           		<div class="owl-carousel">
		            <div class="post-slide">
		                <div class="post-img">
		                    <img class="img-responsive" src="{{ $image }}" alt="{{ $image }}">
		                    <div class="over-layer">
		                        <ul class="post-link">
		                            <li>
		                                <a href="https://{{ lienExterne($fac->website) }}" class="fa fa-link"></a>
		                            </li>
		                        </ul>
		                    </div>
		                    <div class="post-date">
		                        <span class="date">{{ $fac->ville }}</span>
		                    </div>
		                </div>
		                <div class="post-content">
		                    <h3 class="post-title">
		                    	<a href="#" title="{{ $fac->name }}">{{ $fac->name }}</a>
		                    </h3>
		                    <p class="post-description">{{ Str::limit($fac->details,50) }}</p>
		                    <form id="bourse" action="{{ route('university.voir') }}" method="POST">
                                @csrf
                               	<input name="university_id" type="text" value="{{ $fac->id }}" readonly="" hidden="">
                               	<button type="submit" class="btn btn-xs read-more">{{ $fac->code }}</button>
                            </form>
		                </div>
		            </div>
        		</div>
            </div>
        @endforeach
		</div>
    </div>
	<div class="col-lg-3 col-md-3">
		<div class="widget-sidebar">
			<div class="well">
				<form action="">
					<h4><i class="fa fa-search"></i> Rechercher la fac</h4>
					<form action="">
						<div class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
						<!-- /input-group -->
					</form>
				</form>
			</div>
			<div class="well">
				<form action="#" method="" id="vil">
					<h4><i class="fa fa-search"></i> Rechercher par ville</h4>
					<div class="input-group">
					    <select name="ville" id="ville" class="form-control">
							<option value="">Selectionnez la ville</option>
							@include('layouts.partials._ville')
						</select>
				     	<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

@stop