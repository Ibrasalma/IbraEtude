<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="navbar-brand" href="{{ route('root_path') }}">{{ env('APP_NAME') }}</a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#{{-- route('profile_path') --}}"><i class="glyphicon glyphicon-cog"></i></a>
        <a class="p-2 text-dark" href="#"><i class="glyphicon glyphicon-trash"></i></a>
        <a class="p-2 text-dark" href="{{ route('password.request') }}"><i class="glyphicon glyphicon-warning-sign"></i></a>
        <a class="p-2 text-dark" href="{{ route('logout') }}" data-confirm="Êtes-vous sûr?" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-off"></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3" ><!--left col-->
            <div class="text-center">
                
                    <!--//$photo=App\Models\PhotoProfil::all()->get('location');
                    //$user->photo_profils()->where('user_id', 1)->get();
                    //dd($photo);-->
                
                <a href="{{ url('home') }}"><img src="{{ $fichier }}" class="avatar img-rectangle img-thumbnail" style="max-height: 150px;" alt="{{ Auth::user()->id }}"></a>
                
                @include('flashy::message')
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>
                </div>

                @endif
                <form action="{{ route('avatars.store') }}" class="form-horizontal form-bordered" id="upload-contacts" method="post" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-9 col-md-6">
                            <input type="file" class="filestyle" id="filename" name="filename" data-buttonText="Browse">
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-12 col-md-12">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-upload"></i>Changer l'avatar</button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </form>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Il ya eu des problèmes avec votre entrée.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <ul class=" panel panel-default list-group">
                <li class="list-group-item panel-heading">Profile <i class="fa fa-user"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Enregistré le</strong></span>{{ dateConnection(Auth::user()->created_at) }}</li>
                
                @if(Cache::has('user-is-online-' . auth()->user()->id))
                <li class="list-group-item text-right"><span class="pull-left"><strong>{{ Auth::user()->name }} </strong></span><span class="text-success">En ligne</span></li>
                @else
                <li class="list-group-item text-right"><span class="pull-left"><strong>{{ Auth::user()->name }} </strong></span><span class="text-secondary">Hors ligne</span></li>
                @endif
                <li class="list-group-item text-right"><span class="pull-left"><strong>Dernière vue</strong></span>{{ format_date(Auth::user()->last_seen) }}</li>
            
            </ul>
            <ul class="panel panel-default list-group">
                <?php
                    $etudiants = App\Models\EtudiantStory::where('user_id',auth()->user()->id)->get('id');
                    
                    foreach ($etudiants as $e){
                        $etudiant = $e->id;
                        $applications = App\Models\Application::where('etudiant_id',$etudiant)->get('id');
                        foreach($applications as $a){
                            $number = count($applications);
                        }
                    }
                ?>
                    
                   
                <div class="panel-heading">Activity <i class="fa fa-dashboard fa-1x"></i></div>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong><a href="{{ route('application.voir') }}">Mes applications</a></strong></span><span>{{ ($number) ?? '' }}</span>
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><strong><a href="{{ route('students.appear') }}">Mes étudiants</a></strong></span><span>{{ count($etudiants) }}</span>
                </li>
            </ul> 
        </div>

<!--/col-3-->