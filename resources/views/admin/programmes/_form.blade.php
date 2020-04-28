<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="name">Name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="name" placeholder="Nom du programme" class="form-control" required="true" value="{{ old('name') ?? $programme->name }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="duration">Durée</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="duration" name="duration" placeholder="Durée du programme" class="form-control" required="true" value="{{ old('duration') ?? $programme->duration }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="degree">Diplome</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="degree" for="degree">
                <option>Selectionnez votre diplome</option>
                @foreach ($diplome as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$programme->degree) ? 'selected="selected"' : '' }}>{{ $element }}</option>
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
          <label class="col-md-4 control-label" for="required">Requis</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="required" name="requirement" placeholder="Les prérequis" class="form-control" required="true" value="{{ old('requirement') ?? $programme->requirement }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="domaine">Domaine</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="domaine">
                <option>Selectionnez votre langue</option>
                @foreach ($domaine as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$programme->domaine) ? 'selected="selected"' : '' }}>{{ $element }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="langue">Langue</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="language">
                <option>Selectionnez votre langue</option>
                @foreach ($langue as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$programme->language) ? 'selected="selected"' : '' }}>{{ $element }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="tuition">Tuition</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="tuition" name="tuition" placeholder="Tuition" class="form-control" required="true" value="{{ old('tuition') ?? $programme->tuition }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="accomodation">Accomodation</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="accomodation" name="accomodation" placeholder="Accomodation" class="form-control" required="true" value="{{ old('accomodation') ?? $programme->accomodation }}" type="text">
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
              <textarea name="details" id="details" cols="100" rows="10">
                {{ old('details') ?? $programme->details }}
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
        <a href="{{ route('programmes.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>