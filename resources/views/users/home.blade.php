@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/user.css') }}">

@section('content')
    <div class="col-md-9">
      @include('users._entete')
      <div class="carousel-reviews broun-block">
        <style>
          .carousel-control.left,.carousel-control.right  {background:none;width:25px;}
          .carousel-control.left {left:-25px;}
          .carousel-control.right {right:-25px;}
        </style>
        <h2 class="text-center">Profil de quelques universités</h2>
        <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active">
              <?php 
                use Illuminate\Support\Str;
                $universite = App\Models\University::where('id','>',0)->where('id','<=',4)->get();
              ?>              
              @foreach ($universite as $fac)
              <?php
                $image = App\Models\Galerie::where('university_id',$fac->id)->first();
                if(!is_null($image)){
                  $image = image($image);
                }
              ?>
              <div class="col-md-3">
                <div class="card profile-card-2">
                  <div class="card-img-block"><img class="img-fluid" src="{{ $image }}" alt="Card image cap" /></div>
                  <div class="card-body pt-5">
                    <h5 class="card-title">{{ $fac->code }}</h5>
                    <p class="card-text">{{ Str::limit($fac->details,50) }}</p>
                    <div class="icon-block"><a href="{{ $fac->wechat }}"><i class="fa fa-wechat"></i></a><a href="{{ lienExterne($fac->website) }}"> <i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="item">
              <?php 
                $universite = App\Models\University::where('id','>',4)->where('id','<=',8)->get();
              ?>
              @foreach ($universite as $fac)
              <?php
                $image = App\Models\Galerie::where('university_id',$fac->id)->first();
                if(!is_null($image)){
                  $image = image($image);
                }
              ?>
              <div class="col-md-3">
                <div class="card profile-card-2">
                  <div class="card-img-block"><img class="img-fluid" src="{{ $image }}" alt="Card image cap" /></div>
                  <div class="card-body pt-5">
                    <img src="{{ $image }}" alt="profile-image" class="profile"/>
                    <p class="card-text">{{ Str::limit($fac->details,30) }}</p>
                    <div class="icon-block"><a href="{{ $fac->wechat }}"><i class="fa fa-wechat"></i></a><a href="{{ lienExterne($fac->website) }}"> <i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        <div class="text-center" style="padding-top: 2em;"><a href="{{ route('universities.liste') }}" class="btn btn-success">Voir toutes les universités</a></div>
      </div>
    </div>
  </div>
</div> 
@endsection
