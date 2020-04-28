@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
        <div class="col-md-9">
	       <section>
                <div class="wizard">
                    @include('users._tete')
                    <div class="tab-content">
                        @include('users._form_document')
                        <ul class="list-inline pull-right">
                            <li><a href="{{ route('application_step2') }}" type="button" class="btn btn-default prev-step">Previous</a></li>
                            <li><a href="{{ route('application_step4') }}" type="button" class="btn btn-primary next-step">continuer</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stop
