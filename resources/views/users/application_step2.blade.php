@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
        <div class="col-md-9">
	       <section>
                <div class="wizard">
                    @include('users._tete')
                    <div class="tab-content">
                        <form role="form" action="{{ route('background.insert') }}" method="POST">
                            {{ csrf_field() }}
                            @include('users._form_background')
                            <input type="text" name="background" value="{{ $background->id }}" readonly="" hidden="">
                            <br>
                            <ul class="list-inline pull-right">
                                <li><a href="{{ route('application_step1') }}" type="button" class="btn btn-default prev-step">Previous</a></li>
                                <li><button type="submit" class="btn btn-success next-step">Sauvegarder</button></li>
                                <li><a href="{{ route('application_step3') }}" type="button" class="btn btn-primary next-step">continuer</a></li>
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
