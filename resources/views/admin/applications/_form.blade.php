<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
      <div class="form-group">
          <label class="col-md-4 control-label">Etudiants</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="etudiant_id">
                <option>Selectionnez l'étudiant</option>
                @foreach ($etudiant as $element)
                  <option value="{{ $element->id }}" {{ ($element->id==$application->etudiant_id) ? 'selected="selected"' : '' }}>{{ $element->given_name }}</option>
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
          <label class="col-md-4 control-label">Statut</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="statut">
                <option>Selectionnez la statut</option>
                @foreach ($statut as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$application->statut) ? 'selected="selected"' : '' }}>{{ $element }}</option>
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
        <a href="{{ route('applications.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>