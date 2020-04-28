<link rel="stylesheet" type="text/css" href="{{ asset('/css/carousel.css') }}">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="{{ asset('/images/nanjing.jpg') }}" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Nanjing</h1>
              <p> Une ville historique, c'est l'une des anciennes capitales de l'empire du milieu
              <p><a class="btn btn-lg btn-primary" href="#" role="button">découvrir</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="{{ asset('/images/hangzhou.jpg') }}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Hangzhou</h1>
              <p> Une ville éconmique, c'est la ville du géant chinois ；马云 (Jack Ma)
              <p><a class="btn btn-lg btn-primary" href="#" role="button">découvrir</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="{{ asset('/images/shanghai.jpg') }}" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Shanghai</h1>
              <p> Vous voulez voir des merveilles? Venez à Shanghai,une ville moderne à l'image de Las Vegas
              <p><a class="btn btn-lg btn-primary" href="#" role="button">découvrir</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Avant</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Après</span>
      </a>
    </div><!-- /.carousel -->
