<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="frais">Frais</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="frais" name="frais" placeholder="Scholarship Fees" class="form-control" required="true" value="{{ old('frais') ?? $bourse->frais }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="duree">Durée</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="duree" name="duree" placeholder="Durée de la bourse" class="form-control" required="true" value="{{ old('duree') ?? $bourse->duree }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="tuition">Tuition</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="tuition" name="tuition" placeholder="Tuition" class="form-control" required="true" value="{{ old('tuition') ?? $bourse->tuition }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="accomodation">Accomodation</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="accomodation" name="accomodation" placeholder="Accomodation" class="form-control" required="true" value="{{ old('accomodation') ?? $bourse->accomodation }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="categorie">Categorie</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" id="categorie" name="categorie">
                <option>A really long option to push the menu over the edget</option>
                @foreach ($categorie as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$bourse->categorie) ? 'selected="selected"' : '' }}>{{ $element }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="programme">Programme</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" id="programme" name="programme_id">
                <option>A really long option to push the menu over the edget</option>
                @foreach ($programme as $element)
                  <option value="{{ $element->id }}" {{ ($element->id==$bourse->programme_id) ? 'selected="selected"' : '' }}>{{ $element->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
  </td>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="date_entree">Ouverture</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="date_entree" name="date_entree" placeholder="Ouverture prochaine" class="form-control" required="true" value="{{ old('degree') ?? $bourse->categorie }}" type="text">
            </div>
          </div>
        </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="stipend">Stipend</label>
            
              <div class="form-group col-md-4">
                <input id="stipend" name="stipend" class="form-control" required="true" value="{{ old('stipend') ?? 1 }}" type="radio" {{ ($bourse->stipend==1) ? 'checked' : '' }}><label for="stipend">Oui</label>
                <input id="stipend" name="stipend" class="form-control" required="true" value="{{ old('stipend') ?? 0 }}" type="radio" {{ ($bourse->stipend==0) ? 'checked' : '' }}><label for="stipend">Non</label>
              </div>
            <label class="col-md-2 control-label" for="revue">Revue</label>
            
              <div class="form-group col-md-4">
                <input id="revue" name="revue" class="form-control" required="true" value="{{ old('revue') ?? 1 }}" type="radio" {{ ($bourse->revue==1) ? 'checked' : '' }}><label for="revue">Oui</label>
                <input id="revue" name="revue" class="form-control" required="true" value="{{ old('revue') ?? 0 }}" type="radio" {{ ($bourse->revue==0) ? 'checked' : '' }}><label for="revue">Non</label>
              </div>
            
          </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="nbre_place">Places</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="nbre_place" name="nbre_place" placeholder="Nombre de Places" class="form-control" required="true" value="{{ old('nbre_place') ?? $bourse->nbre_place }}" type="text">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-4 control-label" for="university">Université</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" id="university" name="university_id">
                <option>A really long option to push the menu over the edget</option>
                @foreach ($university as $element)
                  <option value="{{ $element->id }}" {{ ($element->id==$bourse->university_id) ? 'selected="selected"' : '' }}>{{ $element->code }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
  </td>
</tr>
<tr>
  <td colspan="2">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-1 control-label" for="details">Details</label>
          <div class="col-md-11 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <textarea name="detail" id="details" cols="100" rows="10">
              </textarea>
            </div>
          </div>
        </div>
      </fieldset>
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
        <a href="{{ route('bourses.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>