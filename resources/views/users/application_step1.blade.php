@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
        <div class="col-md-9">
	       <section>
                <div class="wizard">
                    @include('users._tete')
                    <div class="tab-content">
                        <form role="form" action="{{ route('stories.store') }}" method="POST">
                            {{ csrf_field() }}
                            @include('users._form_etudiant')
                            <ul class="list-inline pull-right">
                                <li><button class="form-control btn btn-success next-step" type="submit">Sauvegarder</button></li>
                                <li><a href="{{ route('application_step2') }}" type="button" class="btn btn-primary">continuer</a></li>
                            </ul>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stop
