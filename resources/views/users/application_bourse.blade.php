@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
<div class="col-md-9">
	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="{{ route('application_path') }}#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="{{ route('application_path') }}#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="{{ route('application_path') }}#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="step1">
                    <form role="form" action="{{ route('stories.store') }}" method="POST">
                        {{ csrf_field() }}
                        @include('users._form_etudiant')
                        <ul class="list-inline pull-right">
                            <li><button class="form-control btn btn-success next-step" type="submit">Sauvegarder</button></li>
                            <li><button type="button" class="btn btn-primary next-step">continuer</button></li>
                        </ul>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="step2">
                    <form role="form" action="{{ route('backgrounds.store') }}" method="POST">
                        {{ csrf_field() }}
                        @include('users._form_background')
                        <br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="submit" class="btn btn-success next-step">Sauvegarder</button></li>
                            <li><button type="button" class="btn btn-primary next-step">continuer</button></li>
                        </ul>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="step3">
                    @include('users._form_document')
                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Precedent</button></li>
                        <li><button type="button" class="btn btn-primary btn-info-full next-step">continuer</button></li>
                    </ul>
                </div>
                <div class="tab-pane" role="tabpanel" id="complete">
                    <div class="step44">
                        <h5>Completed</h5>
                            
                          
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
</div>
</div>

</div>

<script src="{{ asset('/js/app_bourse.js') }}"></script>
@stop
