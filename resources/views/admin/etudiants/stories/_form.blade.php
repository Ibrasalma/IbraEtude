<tr>
    <td colspan="2">
        <div class="row">
            <div class="col-md-6">
                <label for="utilisateur">Utilisateur</label>
                <select name="user_id" id="utilisateur">
                   @foreach ($utilisateur as $element)
                        <option value="{{ $element->id }}">{{ $element->username }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="col-md-6">
                <label for="bourse">Bourse</label>
                <select name="bourse_id" id="bourse">
                    @foreach ($bourse as $element)
                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="firstName">Prénom{!! required() !!}</label>
                <input type="text" name="given_name" class="form-control {{ $errors->has('given_name') ? 'is-invalid' : '' }}" id="firstName" placeholder="Entrez votre prénom" value="{{ old('given_name') ?? $story->given_name }}">
                {!! $errors->first('given_name','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6">
                <label for="lastName">Nom{!! required() !!}</label>
                <input type="text" class="form-control {{ $errors->has('family_name') ? 'is-invalid' : '' }}" id="lastName" name="family_name" placeholder="Entrez votre nom de famille" value="{{ old('family_name') ?? $story->family_name }}">
                {!! $errors->first('family_name','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="birthdate">Date de Naissance{!! required() !!}</label>
                <input type="date" name="birthdate" class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : '' }}" id="birthdate" placeholder="Entrez votre date de naissance" value="{{ old('birthdate') ?? $story->birthdate }}">
                {!! $errors->first('birthdate','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6">
                <label for="birthplace">Lieu de Naissance{!! required() !!}</label>
                <input type="text" name="birthplace" class="form-control {{ $errors->has('birthplace') ? 'is-invalid' : '' }}" id="birthplace" placeholder="Entrez votre lieu de Naissance" value="{{ old('birthplace') ?? $story->birthplace }}">
                {!! $errors->first('birthplace','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="passport">Passeport No{!! required() !!}</label>
                <input type="text" name="passport_number" class="form-control {{ $errors->has('passport_number') ? 'is-invalid' : '' }}" id="passport" placeholder="Entrez votre numéro de passeport" value="{{ old('passport_number') ?? $story->passport_number }}">
                {!! $errors->first('passport_number','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6">
                <label for="epirationPassport">Date Expiration{!! required() !!}</label>
                <input type="date" name="passport_expire" class="form-control {{ $errors->has('passport_expire') ? 'is-invalid' : '' }}" id="epirationPassport" placeholder="Entrez la date d'expiration" value="{{ old('passport_expire') ?? $story->passport_expire }}">
                {!! $errors->first('passport_expire','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="nationality">Nationalité{!! required() !!}</label>
                <select name="nationality" id="nationality" class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" style="height: 2.5em;">
                    <option value="">Selectionnez votre nationalité </option>
                    @include('layouts.partials._pays')
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="gender">Sexe{!! required() !!}</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="M" checked>
                    <label class="form-check-label" for="gender">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
                    <label class="form-check-label" for="gender">F</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <label for="status form-group">Etat civil{!! required() !!}</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="marital_status" id="status" value="marriee" checked>
                    <label class="form-check-label" for="status">Marié(e)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="marital_status" id="status" value="celibataire">
                    <label class="form-check-label" for="status">Célibataire</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="marital_status" id="status" value="divorce">
                    <label class="form-check-label" for="status">Divorcé(e)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="marital_status" id="status" value="veuf">
                    <label class="form-check-label" for="status">Veuf(ve)</label>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <label for="mobile">Mobile{!! required() !!}</label>
                <input type="text" name="mobile" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" id="mobile" placeholder="Votre téléphone mobile (+86)" value="{{ old('mobile') ?? $story->mobile }}">
                {!! $errors->first('mobile','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="occupation">Occupation{!! required() !!}</label>
                <input type="text" name="occupation" class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}" id="occupation" placeholder="Vous faites quoi dans la vie" value="{{ old('occupation') ?? $story->occupation }}">
                {!! $errors->first('occupation','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6 form-group">
                <label for="affiliated">Institution Affilié{!! required() !!}</label>
                <input type="text" name="affiliated" class="form-control {{ $errors->has('affiliated') ? 'is-invalid' : '' }}" id="affiliated" placeholder="Nom de votre lieu de travail ou école" value="{{ old('affiliated') ?? $story->affiliated }}">
                {!! $errors->first('affiliated','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="diplome">Dernier diplôme obtenu{!! required() !!}</label>
                <select name="highest_degree" id="diplome" class="form-control {{ $errors->has('highest_degree') ? 'is-invalid' : '' }}" style="height: 2.5em;">
                    <option>Selectionnez votre diplome</option>
                    @foreach ($diplome as $element)
                    <?php $element = substr($element,1,-1) ?>
                    <option value="{{ $element }}">{{ $element }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="religion">Religion{!! required() !!}</label>
                <input type="text" name="relligion" class="form-control {{ $errors->has('relligion') ? 'is-invalid' : '' }}" id="religion" placeholder="Quel est votre réligion" value="{{ old('relligion') ?? $story->relligion }}">
                {!! $errors->first('relligion','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="hoby">Hoby{!! required() !!}</label>
                <input type="text" name="hobbies" class="form-control {{ $errors->has('hobbies') ? 'is-invalid' : '' }}" id="hoby" placeholder="Quels sont vos hobies | Separé par une virgule" value="{{ old('hobbies') ?? $story->hobbies }}">
                {!! $errors->first('hobbies','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 col-xs-4 form-group">
                        <label for="isChina">Avez-vous été en Chine{!! required() !!}</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_in_china" id="isChina" value="1" checked>
                            <label class="form-check-label" for="isChina">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_in_china" id="isChina" value="0">
                            <label class="form-check-label" for="isChina">Non</label>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-8 form-group">
                        <label for="studyChina">Avez-vous étudié en Chine{!! required() !!}</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="studied_china" id="studyChina" value="1" checked>
                            <label class="form-check-label" for="studyChina">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="studied_china" id="studyChina" value="0">
                            <label class="form-check-label" for="studyChina">Non</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="pays">Pays de residence{!! required() !!}</label>
                <select class="form-control {{ $errors->has('pays') ? 'is-invalid' : '' }}" name="pays" id="pays" selected="{{ old('pays') ?? $story->pays }}" style="height: 2.5em;">
                    <option value="">Selectionner le pays de residence</option>
                    @include('layouts.partials._pays')
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="ville">Ville de residence{!! required() !!}</label>
                <input type="text" name="ville" class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" id="ville" placeholder="Entrez votre ville de residence" value="{{ old('ville') ?? $story->ville }}">
                {!! $errors->first('ville','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="adresse">Adresse{!! required() !!}</label>
                <input type="text" name="adresse" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="adresse" placeholder="Commune, quartier, secteur, rue, numero de maison" value="{{ old('adresse') ?? $story->adresse }}">
                {!! $errors->first('adresse','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="col-md-6 form-group">
                <label for="poste">Code postal{!! required() !!}</label>
                <input type="text" name="code_postal" class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}" id="poste" placeholder="Entrez votre code postal" value="{{ old('code_postal') ?? $story->code_postal }}">
                {!! $errors->first('code_postal','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
    </td>
</tr>
<tr>
  <td colspan="1">
    <fieldset>
      <div class="form-group col-md-12">
        <input type="submit" value="{{ $formSubmitionText }}" class="btn btn-primary btn-block">
      </div>
    </fieldset>
  </td>
  <td colspan="1">
    <fieldset>
      <div class="form-group col-md-12">
        <a href="{{ route('stories.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>