@extends('layouts.default',['title'=>'About'])

<link rel="stylesheet" href="{{ asset('/css/about.css') }}">

@section('content')
	<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">A propos</h2>
                        <p class="aboutus-text">Laisse moi prendre la temperature</p>
                        <p class="aboutus-text">J'écris sur mon phone pour éviter les ratures</p>
                        <p class="aboutus-text">Si tu peux le faire seul, fais-le, compte sur personne, fais-le</p>
                        <p class="aboutus-text">Deux verres se levent, je crois que ça veut boire à ma santé</p>
                        <p class="aboutus-text">Pour que les petits mangent, j'irai bosser même le dimanche</p>
                        <p class="aboutus-text">Papa m'a toujours dit pas de gaspillage.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner" >
                        <img src="{{ asset('/images/ib-logo.png') }} " alt="">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Special</h4>
                                    <p>Appelle moi Lefa premier du nom; </p>
                                    <p>J'écoute plus trop de conseils, parce que trop de conseils me ralentit dans mon élan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Mauvais</h4>
                                    <p>Tu vois les choses en couleur et je vois les choses en tout noir, vas donner ton amour à un autre</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Chateaux de versailles</h4>
                                    <p>Je crois qu'elle a des sentiments,je bosse le dossier en silence,je passe le week-end, je rentre dimanche.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop