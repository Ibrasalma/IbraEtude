@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
        <div class="col-md-9">
           <section>
                <div class="wizard">
                    @include('users._tete')
                    <div class="tab-content">
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
                                    <p>{{ $background->contact_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Relation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->contact_relationship }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->contact_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->contact_email }}</p>
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
                                    <p>{{ $background->pere_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Occupation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->pere_occupation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->pere_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->pere_email }}</p>
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
                                    <p>{{ $background->mere_name }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Occupation<span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->mere_occupation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Phone <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->mere_tel }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Email <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->mere_email }}</p>
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
                                    <p>{{ $background->education_1_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_1_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_1_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_1_end }}</p>
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
                                    <p>{{ $background->education_2_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_end }}</p>
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
                                    <p>{{ $background->education_2_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Option <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_option }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Diplome <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_degree }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->education_2_end }}</p>
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
                                    <p>{{ $background->work_institutition }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Poste <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->work_post }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 field">
                                <label class="col-md-2">Industrie <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->work_categori }}</p>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-md-2">Date de fin <span>*</span> </label>
                                <div class="col-sm-3">
                                    <p>{{ $background->work_end }}</p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><a href="{{ route('application_step3') }}" type="button" class="btn btn-default prev-step">precedent</a></li>
                            <li><a href="{{ route('applications.modifie') }}" onsubmit="return confirm('Êtes-vous sûr de vouloir Soumettre l\'application?');" class="btn btn-success next-step">Soumettre</a></li>
                            <li><a href="{{ route('application_step1') }}" type="button" class="btn btn-primary next-step">editer</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stop
