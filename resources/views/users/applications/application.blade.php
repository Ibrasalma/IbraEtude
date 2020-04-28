@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/user.css') }}">

@section('content')
<div class="col-md-9">
    @include('users._entete')
    <div class="row">
        <div class="container" style="padding-top:30px;">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading text-center">
                    <strong>Détails du programme</strong>
                </div>	            
                    <?php 
                        $univers = App\Models\Bourse::find($infoBourse->id)->university;
                        $program = App\Models\Bourse::find($infoBourse->id)->programme;
                        $university = $univers->name;
                        $programme = $program->name;
                        $langue = $program->language;
                        $duration = $program->duration;
                        $ville = $univers->ville;
                        $degree = $program->degree;
                    ?>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="table-responsive">
                                <ul class="list-group">
                                    <li>
                                        <div class="col-md-6">
                                            <p><strong><u>Code de l'application</u></strong>: {{ $infoBourse->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><u>Programme</u></strong>: {{ $programme }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-6">
                                            <p><strong><u>Ville</u></strong>: {{ $ville }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><u>Langue d'enseignement</u></strong>: {{ $langue }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-6">
                                            <p><strong><u>Rentrée</u></strong>: {{ $infoBourse->date_entree }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><u>Durée du programme</u></strong>: {{ duration($duration) }}</p>
                                        </div>   
                                    </li>
                                    <li>
                                        <div class="col-md-6">
                                            <p><strong><u>Diplôme</u></strong>: {{ $degree }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><u>Durée de la bourse</u></strong>: {{ duree_bourse($infoBourse) }}</p>
                                        </div>    
                                    </li>
                                    <li>
                                        <div class="col-md-12">
                                            <p><strong><u>Frais d'étude</u></strong>: {{ $infoBourse->tuition }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col-md-12">
                                            <p><strong><u>Frais de logement</u></strong>: {{ $infoBourse->accomodation }}</p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <li><a href="{{ route('students.liste') }}" type="button" class="btn btn-primary">suivant</a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop