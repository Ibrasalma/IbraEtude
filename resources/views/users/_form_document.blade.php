<div class="step33">

    @include('flashy::message')
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

      <button type="button" class="close" data-dismiss="alert">×</button>

      <strong>{{ $message }}</strong>
    </div>
    @endif
    <?php
    
        $photo = App\Models\PhotoApplication::where('user_id',$application)->get();
        $passeport = App\Models\Passeport::where('user_id',$application)->get();
        $diplome = App\Models\DegreeOriginal::where('user_id',$application)->get();
        $certificate = App\Models\Degree::where('user_id',$application)->get();
        $releve = App\Models\TranscriptOriginal::where('user_id',$application)->get();
        $transcripts = App\Models\Transcript::where('user_id',$application)->get();
        $letter1 = App\Models\Letter1::where('user_id',$application)->get();
        $letter2 = App\Models\Letter2::where('user_id',$application)->get();
        $plan = App\Models\StudyPlan::where('user_id',$application)->get();
        $police = App\Models\NonCriminal::where('user_id',$application)->get();
        $bank = App\Models\BankStatement::where('user_id',$application)->get();
        $medical = App\Models\Medical::where('user_id',$application)->get();
        $langue = App\Models\Language::where('user_id',$application)->get();
        $formulaire = App\Models\Formulaire::where('user_id',$application)->get();
        $autres = App\Models\AutreApplication::where('user_id',$application)->get();

    ?>
    
    @include('users._formul',['nom'=>"Photo d'identité",'delete'=>"photos.destroy",'rue'=>"photos.store",'donnee'=>'photo.png','releve'=>$photo,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Passeport",'delete'=>"passeports.destroy",'rue'=>"passeports.store",'donnee'=>'passeport.png','releve'=>($passeport) ?? 'ib-logo.png','identifiant'=>$application])
    @include('users._formul',['nom'=>"Diplôme original",'delete'=>"degrees.destroy",'rue'=>"degrees.store",'donnee'=>'diplome.png','releve'=>($diplome) ?? 'ib-logo.png','identifiant'=>$application])
    @include('users._formul',['nom'=>"Diplôme traduit",'delete'=>"diplomes.destroy",'rue'=>"diplomes.store",'donnee'=>'diplome_traduit.png','releve'=>($certificate) ?? 'ib-logo.png','identifiant'=>$application])
    @include('users._formul',['nom'=>"Relévés originaux",'delete'=>"releves.destroy",'rue'=>"releves.store",'donnee'=>'releve.png','releve'=>$releve,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Relévés traduit",'delete'=>"transcripts.destroy",'rue'=>"transcripts.store",'donnee'=>'releve_traduit.png','releve'=>$transcripts,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Lettre de recommandation 1",'delete'=>"letter1s.destroy",'rue'=>"letter1s.store",'donnee'=>'letter1.png','releve'=>$letter1,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Lettre de recommandation 2",'delete'=>"letter2s.destroy",'rue'=>"letter2s.store",'donnee'=>'letter2.png','releve'=>$letter2,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Plan d'étude",'delete'=>"plans.destroy",'rue'=>"plans.store",'donnee'=>'plan.png','releve'=>$plan,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Casier judicaire",'delete'=>"criminals.destroy",'rue'=>"criminals.store",'donnee'=>'casier.png','releve'=>($police) ?? 'ib-logo.png','identifiant'=>$application])
    @include('users._formul',['nom'=>"Relévé bancaire",'delete'=>"banks.destroy",'rue'=>"banks.store",'donnee'=>'banks.png','releve'=>$bank,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Bilan médical",'delete'=>"medicals.destroy",'rue'=>"medicals.store",'donnee'=>'bilan.png','releve'=>$medical,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Formulaire d'application",'delete'=>"formulaires.destroy",'rue'=>"formulaires.store",'donnee'=>'formulaire.png','releve'=>$formulaire,'identifiant'=>$application])
    @include('users._formul',['nom'=>"Certificat de langue",'delete'=>"langues.destroy",'rue'=>"langues.store",'donnee'=>'langue.png','releve'=>($langue) ?? 'ib-logo.png','identifiant'=>$application])
    @include('users._formul',['nom'=>"Autres documents",'delete'=>"autres.destroy",'rue'=>"autres.store",'donnee'=>'autres.png','releve'=>$autres,'identifiant'=>$application])

</div>