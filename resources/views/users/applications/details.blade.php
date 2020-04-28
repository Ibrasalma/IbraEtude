@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/user.css') }}">

@section('content')
<div class="col-md-9">
    @include('users._entete')
    <div class="card">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><span>Information du programme</span></a></li>
            <li role="presentation" class=""><a href="#exigences" aria-controls="exigences" role="tab" data-toggle="tab"><span>Details de l'application</span></a></li>
            <li role="presentation" class=""><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab"><span>Documents soumis</span></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="details">
                <div class="card-body">
                    <ul class="panel list-group">
                    <?php 
                        $univers = App\Models\Bourse::find($application->bourse_id)->university;
                        $program = App\Models\Bourse::find($application->bourse_id)->programme;
                        $bourse = App\Models\Bourse::where('id',$application->bourse_id)->first();
                        $university = $univers->name;
                        $programme = $program->name;
                        $langue = $program->language;
                        $duration = $program->duration;
                        $ville = $univers->ville;
                        $degree = $program->degree;
                    ?>
                        <li>
                            <div class="col-md-6">
                                <p><strong><u>Code de l'application</u></strong>: {{ $application->code }}</p>
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
                                <p><strong><u>Rentrée</u></strong>: {{ $bourse->date_entree }}</p>
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
                                <p><strong><u>Durée de la bourse</u></strong>: {{ duree_bourse($bourse) }}</p>
                            </div>    
                        </li>
                        <li>
                            <div class="col-md-12">
                                <p><strong><u>Frais d'étude</u></strong>: {{ $bourse->tuition }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-12">
                                <p><strong><u>Frais de logement</u></strong>: {{ $bourse->accomodation }}</p>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
            <div class="tab-pane fade" id="exigences">
                <div class="card-body">
                    <ul class="panel list-group">
                        <div class="widget-title">
                        <h5>Information de base de l'application</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Nom de famille <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->family_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Prénoms <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->given_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Numéro du passeport <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->passport_number }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date d'expiration du passeport <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->passport_expire }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Nationalité <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->nationality }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Langue officielle <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ 'Français' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Date de naissance <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->birthdate }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Lieu de naissance <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->birthplace }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Genre <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->gender }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Etat civil <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->marital_status }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Occupation <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->occupation }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Religion <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->relligion }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Dernier diplôme <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->highest_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Mobile <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mobile }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">WhatsAPP <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mobile }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">L'étudiant réside-t-il en Chine actuellement? <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ est_en_chine($story) }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">L'étudiant a t-il étudié en Chine? <span>*</span> </label>
                                <div class="col-sm-3">
                                    <div class="col-md-7" style="padding: 0;">
                                        <p>{{ etudie_en_chine($story) }}</p>
                                    </div>
                                    <div class="col-md-5" style="padding:0">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title"></div>
                        <div class="widget-title">
                        <h5>Contact d'urgence</h5></div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Nom complet <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->contact_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Relation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->contact_relationship }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->contact_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->contact_email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Père</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Nom complet <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->pere_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Occupation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->pere_occupation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->pere_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->pere_email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Mère</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Nom complet <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mere_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Occupation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mere_occupation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mere_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->mere_email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Education 1</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Institution <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_1_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_1_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_1_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_1_end }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Education 2</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Institution 2 <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_end }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Education 3</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Institution 2 <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->education_2_end }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-title">
                            <h5>Travail</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Institution <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->work_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Poste <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->work_post }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Industrie <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->work_categori }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $story->work_end }}</p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="documents">
                <div class="card-body">
                    <?php

                        $photo = App\Models\PhotoApplication::where('user_id',$document)->get();
                        $passeport = App\Models\Passeport::where('user_id',$document)->get();
                        $diplome = App\Models\DegreeOriginal::where('user_id',$document)->get();
                        $certificate = App\Models\Degree::where('user_id',$document)->get();
                        $releve = App\Models\TranscriptOriginal::where('user_id',$document)->get();
                        $transcripts = App\Models\Transcript::where('user_id',$document)->get();
                        $letter1 = App\Models\Letter1::where('user_id',$document)->get();
                        $letter2 = App\Models\Letter2::where('user_id',$document)->get();
                        $plan = App\Models\StudyPlan::where('user_id',$document)->get();
                        $police = App\Models\NonCriminal::where('user_id',$document)->get();
                        $bank = App\Models\BankStatement::where('user_id',$document)->get();
                        $medical = App\Models\Medical::where('user_id',$document)->get();
                        $langue = App\Models\Language::where('user_id',$document)->get();
                        $formulaire = App\Models\Formulaire::where('user_id',$document)->get();
                        $autres = App\Models\AutreApplication::where('user_id',$document)->get();
                        
                    ?>
                    <ul class="panel list-group">
                        @include('users.applications._doc',['nom'=>"Photo d'identité",'donnee'=>'photo.png','files'=>$photo])
                        @include('users.applications._doc',['nom'=>"Passeport",'donnee'=>'passeport.png','files'=>$passeport])
                        @include('users.applications._doc',['nom'=>"Diplôme original",'donnee'=>'diplome.png','files'=>$diplome])
                        @include('users.applications._doc',['nom'=>"Diplôme traduit",'donnee'=>'diplome_traduit.png','files'=>$certificate])
                        @include('users.applications._doc',['nom'=>"Relevé originaux",'donnee'=>'releve.png','files'=>$releve])
                        @include('users.applications._doc',['nom'=>"Relevé traduits",'donnee'=>'transcripts.png','files'=>$transcripts])
                        @include('users.applications._doc',['nom'=>"Lettre de recommandation 1",'donnee'=>'letter1.png','files'=>$letter1])
                        @include('users.applications._doc',['nom'=>"Lettre de recommandation 2",'donnee'=>'letter2.png','files'=>$letter2])
                        @include('users.applications._doc',['nom'=>"Plan d'étude",'donnee'=>'plan.png','files'=>$plan])
                        @include('users.applications._doc',['nom'=>"Casier judiciaire",'donnee'=>'police.png','files'=>$police])
                        @include('users.applications._doc',['nom'=>"Rélevé bancaire ou prise en charge",'donnee'=>'bank.png','files'=>$bank])
                        @include('users.applications._doc',['nom'=>"Examen medical",'donnee'=>'medical.png','files'=>$medical])
                        @include('users.applications._doc',['nom'=>"Certificat de Langue",'donnee'=>'langue.png','files'=>$langue])
                        @include('users.applications._doc',['nom'=>"Formulaire d'inscription",'donnee'=>'formulaire.png','files'=>$formulaire])
                        @include('users.applications._doc',['nom'=>"Autres documents",'donnee'=>'autres.png','files'=>$autres])
                    </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop