<div class="step2">
    <div class="step-21">
        <h5><strong>Education 1</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution1">Institution1{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_1_institutition') ? 'is-invalid' : '' }}" name="education_1_institutition" id="institution1" value="{{ old('education_1_institutition') ?? $background->education_1_institutition }}" placeholder="Institution name" required="Ceci est requis">
                {!! $errors->first('education_1_institutition','<span class="invalid-feedback">:message</span>') !!} 
            </div>
            <div class="col-md-3">
                <label for="option1">Option1{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_1_option') ? 'is-invalid' : '' }}" name="education_1_option" id="option1" value="{{ old('education_1_option') ?? $background->education_1_option }}" placeholder="Option name" required="Ceci est requis">
                {!! $errors->first('education_1_option','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="diplome1">Diplôme{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_1_degree') ? 'is-invalid' : '' }}" name="education_1_degree" id="diplome1" value="{{ old('education_1_degree') ?? $background->education_1_degree }}" placeholder="Option name" required="Ceci est requis">
                {!! $errors->first('education_1_degree','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut1">Date debut{!! required() !!}</label>
                <input type="date" class="form-control {{ $errors->has('education_1_start') ? 'is-invalid' : '' }}" name="education_1_start" id="debut1" value="{{ old('education_1_start') ?? $background->education_1_start }}" placeholder="Debut" required="Ceci est requis">
                {!! $errors->first('education_1_start','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin1">Date fin{!! required() !!}</label>
                <input type="date" class="form-control {{ $errors->has('education_1_end') ? 'is-invalid' : '' }}" name="education_1_end" col="5" id="fin1" value="{{ old('education_1_end') ?? $background->education_1_end }}" placeholder="Fin" required="Ceci est requis">
                {!! $errors->first('education_1_end','<span class="invalid-feedback">:message</span>') !!}
            </div> 
        </div>
        <h5><strong>Education 2</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution2">Institution2{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_2_institutition') ? 'is-invalid' : '' }}" name="education_2_institutition" id="institution2" value="{{ old('education_2_institutition') ?? $background->education_2_institutition }}" placeholder="Institution name" required="Ceci est requis">
                {!! $errors->first('education_2_institutition','<span class="invalid-feedback">:message</span>') !!} 
            </div>
            <div class="col-md-3">
                <label for="option2">Option2{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_2_option') ? 'is-invalid' : '' }}" name="education_2_option" id="option1" value="{{ old('education_2_option') ?? $background->education_2_option }}" placeholder="Option name" required="Ceci est requis">
                {!! $errors->first('education_2_option','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="diplome2">Diplôme{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('education_2_degree') ? 'is-invalid' : '' }}" name="education_2_degree" id="diplome2" value="{{ old('education_2_degree') ?? $background->education_2_degree }}" placeholder="Option name" required="Ceci est requis">
                {!! $errors->first('education_2_degree','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut2">Date debut{!! required() !!}</label>
                <input type="date" class="form-control {{ $errors->has('education_2_start') ? 'is-invalid' : '' }}" name="education_2_start" id="debut2" value="{{ old('education_2_start') ?? $background->education_2_start }}" placeholder="Debut" required="Ceci est requis">
                {!! $errors->first('education_2_start','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin2">Date fin{!! required() !!}</label>
                <input type="date" class="form-control {{ $errors->has('education_2_end') ? 'is-invalid' : '' }}" name="education_2_end" col="5" id="fin2" value="{{ old('education_2_end') ?? $background->education_2_end }}" placeholder="Fin" required="Ceci est requis">
                {!! $errors->first('education_2_end','<span class="invalid-feedback">:message</span>') !!}
            </div> 
        </div>
        <h5><strong>Education 3</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution3">Institution3</label>
                <input type="text" class="form-control {{ $errors->has('education_3_institutition') ? 'is-invalid' : '' }}" name="education_3_institutition" id="institution2" value="{{ old('education_3_institutition') ?? $background->education_3_institutition }}" placeholder="Institution name"> 
                {!! $errors->first('education_3_institutition','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-3">
                <label for="option3">Option3</label>
                <input type="text" class="form-control {{ $errors->has('education_3_option') ? 'is-invalid' : '' }}" name="education_3_option" id="option3" value="{{ old('education_3_option') ?? $background->education_3_option }}" placeholder="Option name">
                {!! $errors->first('education_3_option','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="diplome3">Diplôme</label>
                <input type="text" class="form-control {{ $errors->has('education_3_degree') ? 'is-invalid' : '' }}" name="education_3_degree" id="diplome3" value="{{ old('education_3_degree') ?? $background->education_3_degree }}" placeholder="Option name">
                {!! $errors->first('education_3_degree','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut3">Date debut</label>
                <input type="date" class="form-control {{ $errors->has('education_3_start') ? 'is-invalid' : '' }}" name="education_3_start" id="debut3" value="{{ old('education_3_start') ?? $background->education_3_start }}" placeholder="Debut">
                {!! $errors->first('education_3_start','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin3">Date fin</label>
                <input type="date" class="form-control {{ $errors->has('education_3_end') ? 'is-invalid' : '' }}" name="education_3_end" col="5" id="fin3" value="{{ old('education_3_end') ?? $background->education_3_end }}" placeholder="Fin">
                {!! $errors->first('education_3_end','<span class="invalid-feedback">:message</span>') !!}
            </div> 
        </div>
        <h5><strong>Carrière</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution">Institution</label>
                <input type="text" class="form-control {{ $errors->has('work_institutition') ? 'is-invalid' : '' }}" name="work_institutition" id="institution" value="{{ old('work_institutition') ?? $background->work_institutition }}" placeholder="Institution name"> 
                {!! $errors->first('work_institutition','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-3">
                <label for="poste">Poste</label>
                <input type="text" class="form-control {{ $errors->has('work_post') ? 'is-invalid' : '' }}" name="work_post" id="poste" value="{{ old('work_post') ?? $background->work_post }}" placeholder="Work name">
                {!! $errors->first('work_post','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="industrie">Industrie</label>
                <input type="text" class="form-control {{ $errors->has('work_categori') ? 'is-invalid' : '' }}" name="work_categori" id="industrie" value="{{ old('work_categori') ?? $background->work_categori }}" placeholder="Industrie name">
                {!! $errors->first('work_categori','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut">Date debut</label>
                <input type="date" class="form-control {{ $errors->has('work_start') ? 'is-invalid' : '' }}" name="work_start" id="debut" value="{{ old('work_start') ?? $background->work_start }}" placeholder="Debut">
                {!! $errors->first('work_start','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin">Date fin</label>
                <input type="date" class="form-control {{ $errors->has('work_end') ? 'is-invalid' : '' }}" name="work_end" col="5" id="fin" value="{{ old('work_end') ?? $background->work_end }}" placeholder="Fin">
                {!! $errors->first('work_end','<span class="invalid-feedback">:message</span>') !!}
            </div> 
        </div>
        <h5><strong>Prise en Charge</strong></h5>
        <div class="row">
            <div class="col-md-2">
                <label for="contactName">Nom{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" name="contact_name" id="contactName" value="{{ old('contact_name') ?? $background->contact_name }}" placeholder="Contact name" required="Ceci est requis">
                {!! $errors->first('contact_name','<span class="invalid-feedback">:message</span>') !!} 
            </div>
            <div class="col-md-2">
                <label for="contactRelation">Relation{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('contact_relationship') ? 'is-invalid' : '' }}" name="contact_relationship" id="contactRelation" value="{{ old('contact_relationship') ?? $background->contact_relationship }}" placeholder="Contact Relation" required="Ceci est requis">
                {!! $errors->first('contact_relationship','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="contactOccupatio">Occupation{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('contact_occupation') ? 'is-invalid' : '' }}" name="contact_occupation" id="contactOccupatio" value="{{ old('contact_occupation') ?? $background->contact_occupation }}" placeholder="Contact Occupation" required="Ceci est requis">
                {!! $errors->first('contact_occupation','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="contactAdresse">Adresse{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('contact_adress') ? 'is-invalid' : '' }}" name="contact_adress" id="contactAdresse" value="{{ old('contact_adress') ?? $background->contact_adress }}" placeholder="contact Adresse" required="Ceci est requis">
                {!! $errors->first('contact_adress','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="contact_email">Email{!! required() !!}</label>
                <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" name="contact_email" col="5" id="contactEmail" value="{{ old('contact_email') ?? $background->contact_email }}" placeholder="Contact Email">
                {!! $errors->first('contact_email','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="contactTel">Telephone{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('contact_tel') ? 'is-invalid' : '' }}" name="contact_tel" col="5" id="contactTel" value="{{ old('contact_tel') ?? $background->contact_tel }}" placeholder="+224628000000" required="Ceci est requis">
                {!! $errors->first('contact_tel','<span class="invalid-feedback">:message</span>') !!}
            </div>  
        </div>
        <h5><strong>Père</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution">Nom complet{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('pere_name') ? 'is-invalid' : '' }}" name="pere_name" id="institution" value="{{ old('pere_name') ?? $background->pere_name }}" placeholder="Institution name" required="Ceci est requis">
                {!! $errors->first('pere_name','<span class="invalid-feedback">:message</span>') !!} 
            </div>
            <div class="col-md-3">
                <label for="poste">Occupation{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('pere_occupation') ? 'is-invalid' : '' }}" name="pere_occupation" id="poste" value="{{ old('pere_occupation') ?? $background->pere_occupation }}" placeholder="Work name" required="Ceci est requis">
                {!! $errors->first('pere_occupation','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="industrie">Adresse{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('pere_adress') ? 'is-invalid' : '' }}" name="pere_adress" id="industrie" value="{{ old('pere_adress') ?? $background->pere_adress }}" placeholder="Industrie name" required="Ceci est requis">
                {!! $errors->first('pere_adress','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut">Telephone{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('pere_tel') ? 'is-invalid' : '' }}" name="pere_tel" id="debut" value="{{ old('pere_tel') ?? $background->pere_tel }}" placeholder="Debut" required="Ceci est requis">
                {!! $errors->first('pere_tel','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin">Email{!! required() !!}</label>
                <input type="email" class="form-control {{ $errors->has('pere_email') ? 'is-invalid' : '' }}" name="pere_email" col="5" id="fin" value="{{ old('pere_email') ?? $background->pere_email }}" placeholder="Fin" required="Ceci est requis">
                {!! $errors->first('pere_email','<span class="invalid-feedback">:message</span>') !!}
            </div> 
        </div>
        <h5><strong>Mère</strong></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="institution">Nom complet{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('mere_name') ? 'is-invalid' : '' }}" name="mere_name" id="institution" value="{{ old('mere_name') ?? $background->mere_name }}" placeholder="Institution name" required="Ceci est requis">
                {!! $errors->first('mere_name','<span class="invalid-feedback">:message</span>') !!} 
            </div>
            <div class="col-md-3">
                <label for="poste">Occupation{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('mere_occupation') ? 'is-invalid' : '' }}" name="mere_occupation" id="poste" value="{{ old('mere_occupation') ?? $background->mere_occupation }}" placeholder="Work name" required="Ceci est requis">
                {!! $errors->first('mere_occupation','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="industrie">Adresse{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('mere_adress') ? 'is-invalid' : '' }}" name="mere_adress" id="industrie" value="{{ old('mere_adress') ?? $background->mere_adress }}" placeholder="Industrie name" required="Ceci est requis">
                {!! $errors->first('mere_adress','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="debut">Telephone{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('mere_tel') ? 'is-invalid' : '' }}" name="mere_tel" id="debut" value="{{ old('mere_tel') ?? $background->mere_tel }}" placeholder="Debut" required="Ceci est requis">
                {!! $errors->first('mere_tel','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-2">
                <label for="fin">Email{!! required() !!}</label>
                <input type="email" class="form-control {{ $errors->has('mere_email') ? 'is-invalid' : '' }}" name="mere_email" col="5" id="fin" value="{{ old('mere_email') ?? $background->mere_email }}" placeholder="Fin" required="Ceci est requis">
                {!! $errors->first('mere_email','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
    </div>
</div>