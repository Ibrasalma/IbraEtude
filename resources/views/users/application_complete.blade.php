@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/app_bourse.css') }}">

@section('content')
        <div class="col-md-9">
	       <section>
                <div class="wizard">
                    @include('users._tete')
                    <div class="tab-content">
                        @include('users._stories')
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stop
