<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
      <div class="form-group">
          <label class="col-md-4 control-label">Utilisateurs</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="user_id">
                <option>Selectionnez l'utilisateur</option>
                @foreach ($utilisateurs as $element)
                  <option value="{{ $element->id }}" {{ ($element->id==$avi->user_id) ? 'selected="selected"' : '' }}>{{ $element->username }}</option>
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
          <label class="col-md-4 control-label">Bourse</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="bourse_id">
                <option>Selectionnez la bourse</option>
                @foreach ($bourses as $element)
                  <option value="{{ $element->id }}" {{ ($element->id==$avi->bourse_id) ? 'selected="selected"' : '' }}>{{ $element->name }}</option>
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
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="approuved" id="gender" value="1" {{ ($avi->approuved==1) ? 'checked="checked"' : '' }}>
            <label class="form-check-label" for="gender">OUI</label>
          </div>
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="approuved" id="gender" value="0" {{ ($avi->approuved==0) ? 'checked="checked"' : '' }}>
            <label class="form-check-label" for="gender">NON</label>
          </div>
        </div>
      </fieldset>
    </div>
  </td>
</tr>
<tr>
    <td colspan="3">
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
        <script src="{{ asset('/js/format.js') }}"></script>
            <?php $value = (old('avi')) ?? $avi->avi ?>
            @include('layouts.partials._format_text',['name'=>'avi','value'=>$value])
        </div>
    <hr>
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
        <a href="{{ route('avis.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>                 
    
    