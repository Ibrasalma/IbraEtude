<tr>
  <td colspan="2">
    <div class="well form-horizontal">
      <fieldset>
      <div class="form-group">
          <label class="col-md-4 control-label">Règles</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="signification">
                <option>Selectionnez la règle</option>
                <option value="admin">Administrateur</option>
                <option value="postulant">Postulant</option>
                <option value="blogueur">Blogueur</option>
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
        <a href="{{ route('droits.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>