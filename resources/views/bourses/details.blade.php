@extends('layouts.default',['title'=>'Bourses'])

@section('content')

<link rel="stylesheet" href="{{ asset('/css/bourse.css') }}">
@include('layouts.partials._tete',['nom'=>'Detaisl de la bourse','name'=>'Details bourse','valeur'=>$bourse->name])

<div class="container-fluid">
<link rel="stylesheet" href="{{ asset('/css/tab.css') }}">	
    <div class="col-md-8">
    <?php 
        $univers = App\Models\Bourse::find($bourse->id)->university;
        $program = App\Models\Bourse::find($bourse->id)->programme;
        $commentaire = App\Models\Avi::where('approuved',1)->get();
        $university = $univers->name;
        $programme = $program->name;
        $domaine = $program->domaine;
        $langue = $program->language;
        $duration = $program->duration;
        $ville = $univers->ville;
        $degree = $program->degree;
        $soumission = 100;
    ?>
		<div class="panel panel-success">
			<div class="col-md-3"> <label>BOURSE</label><p>{{ $bourse->name }}</p></div>
			<div class="col-md-3"> <label>VILLE</label><p>{{ $ville }}</p></div>
			<div class="col-md-3"><label>DOMAINE</label><p>{{ $domaine }}</p></div>
			<div class="col-md-3"><label>DUREE</label><p>{{ duree_bourse($bourse) }}</p></div>
		</div>
		<div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><span>Details</span></a></li>
                <li role="presentation" class=""><a href="#exigences" aria-controls="exigences" role="tab" data-toggle="tab"><span>Exigences</span></a></li>
                <li role="presentation" class=""><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab"><span>Documents</span></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">
                    <div class="card-body">
                    	<ul class="panel list-group">
                    		<li class="list-group-item">Nom de la bourse: {{ $bourse->name }}</li>
                    		<li class="list-group-item">Langue d'enseignement: {{ $langue }}</li>
                    		<li class="list-group-item">Ville: {{ $ville }}</li>
                    		<li class="list-group-item">Rentrée: {{ $bourse->date_entree }}</li>
                    		<li class="list-group-item">Diplome: {{ $degree }}</li>
                    		<li class="list-group-item">Durée du programme: {{ duration($duration) }}</li>
                    		<li class="list-group-item">Durée de la bourse: {{ duree_bourse($bourse) }}</li>
                    		<li class="list-group-item">Frais d'études original(USD/ans): {{ dollar($program->tuition) }}</li>
                    		<li class="list-group-item">Frais de logement original (USD/Year): {{ dollar($program->accomodation) }}</li>
                    		<li class="list-group-item">
	                    		<p>
		                    		<li class="list-group-item">Après la bourse frais d'étude(USD/an): {{ dollar($bourse->tuition) }}</li>
		                    		<li class="list-group-item">Après la bourse frais de logement (USD/ans): {{ dollar($bourse->accomodation) }}</li>
		                    		<li class="list-group-item">Avec Allocation mensuel: {{ stipend($bourse) }}</li>
	                    		</p>
                    		</li>
                    		
                    		
                    	</ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="exigences">
                    <div class="card-body">
                    	<ul class="panel list-group">
                    		<li class="list-group-item">Exigence de moyenne:<p style="white-space: normal;">1.Sans aucune matière en échec， plus de 70%.</p><p style="white-space: normal;">2. l'étudiant doit payer les frais {{ $soumission }} USD de soumission du dossier, avant de passer l'interview &nbsp; après obtention de l'admission électronique l'étudiant devra payer {{ dollar($bourse->frais) }} USD avant de recevoir l'admission et le jw202 pour rentrer à l'ambassade.</p><p><br/></p></li>
                    		<li class="list-group-item">Age:18-30 ans</li>
                    		<li class="list-group-item">Niveau de chinois:NON</li>
                    		<li class="list-group-item">Niveau d'anglais:Bien</li>
							<li class="list-group-item">
								<p>
									Due to the large number of applications, this program is currently only open to students from the following nationalities: 

									Africa (Morocco, Algeria, Tunisia), and other countries
								</p>
							</li>
                    	</ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="documents">
                    <div class="card-body">
                    	<ul class="panel list-group">
                    		<li class="list-group-item">Passport Info Page</li>
                    		<li class="list-group-item">Academic Transcripts</li>
                    		<li class="list-group-item">Translate of Academic Transcripts</li>
                    		<li class="list-group-item">Highest Diploma Certificate</li>
                    		<li class="list-group-item">Translate of Highest Diploma Certificate</li>
                    		<li class="list-group-item">Recommendation Letters(Pour les études post superieurs</li>
                    		<li class="list-group-item">CV</li>
                    		<li class="list-group-item">Study Plan</li>
                    		<li class="list-group-item">Certificate of Non-criminal Record</li>
                    		<li class="list-group-item">Bank Statement</li>
                    		<li class="list-group-item">Application Form</li>
                    		<li class="list-group-item">Passport Blank Page</li>
                    		<li class="list-group-item">Translate of Certificate of Non-criminal Record(Valid within six months)</li>
                    		<li class="list-group-item">English Test Result</li>
                    		<li class="list-group-item">One Passport-Sized Photo</li>
                    	</ul>
                    	<ul>
                    		<li>
                    			<p>
	                    			<ul>
	                    				<li class="list-group-item">CV form</li>
	                    				<li class="list-group-item">Formulaire d'application</li>
	                    			</ul>
                    			</p>
                    			
                    		</li>
                    	</ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <!-- the comments -->
        @forelse ($commentaire as $com)
            <h3>
                <!--div optionnelle pour contenir le tout-->
                <style>
                    .tde {height:20px;width:20px;cursor:pointer;}
                    #value {height:20px; width: <?=$com->note*20;?>px; background:#E0E001;}
                    #glob {display: flex;}
                </style>
                <div style="float:right;margin-top : 10px;width:100px;"> 

                <!--div en arrière-plan qui s'allongera en fonction de la valeur de $value1-->
                    <div id="value">

                <!--div qui contient les étoiles-->
                        <div id="glob" >
                            <img id="tde_1" src="{{ asset('/images/star.png') }}" class="tde"/>
                            <img id="tde_2" src="{{ asset('/images/star.png') }}" class="tde"/>
                            <img id="tde_3" src="{{ asset('/images/star.png') }}" class="tde"/>
                            <img id="tde_4" src="{{ asset('/images/star.png') }}" class="tde"/>
                            <img id="tde_5" src="{{ asset('/images/star.png') }}" class="tde"/>
                        </div>
                        <a href="{{ route('bourse.note') }}" onclick="event.preventDefault();document.getElementById('bourse').submit();" class="btn btn-success btn-xs">vote</a>
                        <form id="bourse" action="{{ route('bourse.note') }}" method="POST">
                            @csrf
                            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden="">
                            <input type="text" name="bourse_id" value="{{ $bourse->id }}" hidden="">
                            <input name="note" id="note" type="text" value="" readonly="" hidden="" onsubmit="entree()">
                        </form>
                    </div>
                </div>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="{{ asset('/js/vote.js') }}"></script>
                <i class="fa fa-comment"></i> L'utilisateur {{ $user = App\Models\Avi::find($com->id)->user->username }} a dit le :<small> {{ dateConnection($com->updated_at) }} à {{ heure($com->updated_at) }}</small>
            </h3>
            <p>{{ substr($com->avi,3,-4) }}</p>
        @empty
            {{ 'Aucun commentaire approuvé, soyez le premier à en laisser' }}
        @endforelse
        @auth
            <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
            <script src="{{ asset('/js/format.js') }}"></script>
            <form action="{{ route('bourse.comment') }}" method="POST">
                @csrf
                <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden="">
                <input type="text" name="bourse_id" value="{{ $bourse->id }}" hidden="">
                @include('layouts.partials._format_text',['name'=>'avi'])
                    <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Soumettre</button>
                </div>
            <hr>
            </form>
            
            @else
            <a href="{{ route('login') }}"><i class="glyphicon glyphicon-log-in"></i> Se connecter</a>Pour laisser un commentaire
        @endauth
            
        </div>
  
	</div>
	<div class="panel panel-default col-md-4">
		<div class="panel-heading">Comment Postuler</div>
		<div class="panel-body">
			<ul class="panel list-group">
                <li class="list-group-item"><strong><u>Etape 1:</u></strong> 
	            	<p>D'abord vous devez vous connecter, si vous n'avez pas de compte cliquez ici pour en creer</p>
                </li>
                <li class="list-group-item "><strong><u>Etape 2</u></strong>
					<p>Compléter le formulaire de soupscription et ajouter vos documents</p>
                </li>
                <li class="list-group-item"><strong><u>Etape 3</u></strong>
                	<p>Valider l'application et payer les frais {{ $soumission }} USD de soumission </p>
                </li>
                <li class="list-group-item"><strong><u>Etape 4</u></strong>
                	<p>Après payement votre application sera en vérification </p>
                </li>
                <li class="list-group-item"><strong><u>Etape 5</u></strong>
                	<p>Après acceptation du dossier on vous fournira un fichier éléctronique </p>
                </li>
                <li class="list-group-item"><strong><u>Etape 6</u></strong>
                	<p>Payer les frais de services {{ dollar($bourse->frais) }} USD et envoi des documents par poste</p>
                </li>
                <p data-placement="top" data-toggle="tooltip" title="Edit">
				@auth
					<div class="text-center">
						<a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('application_info') }}">Appliquer maintenant</a>
					</div>
					@else
					<a href="{{ route('login') }}"><i class="glyphicon glyphicon-log-in"></i> Se connecter pour postuler</a>
				@endauth
				</p>
            </ul> 
        </div>
    </div>
</div>
@stop
