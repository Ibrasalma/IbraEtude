@extends('layouts.default')

<link rel="stylesheet" href="{{ asset('/css/register.css') }}">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" action="{{ route('register') }}" method="POST">
                <h2>Bienvenue sur notre plateforme <small>S'enregistrer</small></h2>
                <hr class="colorgraph">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" id="first_name" class="form-control input-lg " name="name" placeholder="nom utilisateur" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    {!! $errors->first('name','<span class = "error">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" id="email" class="form-control input-lg " placeholder="Email" value="{{ old('email') }}" required autocomplete="email" tabindex="4">
                    {!! $errors->first('email','<span class = "error">:message</span>') !!}
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" id="password" class="form-control input-lg " placeholder="mot de passe" tabindex="5" required autocomplete="new-password">
                            {!! $errors->first('password','<span class = "error">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input type="password" id="password_confirmation" class="form-control input-lg " placeholder="confirm mot de passe" tabindex="6" name="password_confirmation" required autocomplete="new-password">
                            {!! $errors->first('password_confirmation','<span class = "error">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-3 col-md-3">
                        <span class="button-checkbox">
                            <button type="button" class="btn" data-color="info" tabindex="7">
                                <input type="checkbox" name="t_and_c" id="t_and_c" value="1" {{ old('remember') ? 'checked' : '' }} required>J'accepte</button>
                        </span>
                    </div>
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        En cliquant sur <strong class="label label-primary">S'inscrire</strong>, vous acceptez les <a href="#" data-toggle="modal" data-target="#t_and_c_m">termes et conditions</a> 
                    </div>
                </div>
                
                <hr class="colorgraph">
                <div class="row">

                    <div class="col-xs-12 col-md-6">
                        <input type="submit" value="S'inscrire" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>
                    <div class="col-xs-12 col-md-6">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-success btn-block btn-lg">Se connecter</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Termes & Conditions</h4>
                </div>
                <div class="modal-body">
                    <p> Bienvenue sur notre plateforme</p>
                    <p class="h5">ETAPE 1</p>
                    <p class="p">Créez votre compte et connectez toi</p>
                    <p class="h5">ETAPE 2</p>
                    <p class="p">Recherchez votre bourse </p>
                    <p class="h5">ETAPE 3</p>
                    <p class="p">Completez le formulaire</p>
                    <p class="h5">ETAPE 4</p>
                    <p class="p">Payez les frais d'inscription</p>
                    <p class="h5">ETAPE 5</p>
                    <p class="p">Attendez les resultats</p>
                    <p class="h5">ETAPE 6</p>
                    <p class="p">Payez les frais de services</p>
                    <p class="h5">ETAPE 7</p>
                    <p class="p">Obtenez les documents </p>
                    <p class="h5">ETAPE 8</p>
                    <p class="p">Cherchez le visa</p>
                    <p class="h5">ETAPE 9</p>
                    <p class="p">Arrivez en Chine</p>
                    <p class="h5">ETAPE 10</p>
                    <p class="p">Installez vous et integrez vous</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">J'accepte</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<script src="{{ asset('/js/register.js') }}"></script>
@endsection

