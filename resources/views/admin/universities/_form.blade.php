<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="name">Name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="name" placeholder="Nom de l'université " class="form-control" required="true" value="{{ old('name') ?? $university->name }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="slogan">Slogan</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="slogan" name="slogan" placeholder="Slogan de la fac" class="form-control" required="true" value="{{ old('slogan') ?? $university->slogan }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="province">Province</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="province">
                <option>Selectionnez la Province</option>
                @foreach ($province as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$university->province) ? 'selected="selected"' : '' }}>{{ $element }}</option>
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
          <label class="col-md-4 control-label" for="website">Website</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="website" name="website" placeholder="Leur site" class="form-control" required="true" value="{{ old('website') ?? $university->website }}" type="text">
            </div>
          </div>
        </div>
         
          <div class="form-group inline-block">
            <label class="col-md-2 control-label" for="wechat">Wechat</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="wechat" name="wechat" placeholder="Id wechat" class="form-control" required="true" value="{{ old('wechat') ?? $university->wechat }}" type="text">
              </div>
            </div>
            <label class="col-md-2 control-label" for="ranking">Classement</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="ranking" name="ranking" placeholder="Classement" class="form-control" required="true" value="{{ old('ranking') ?? $university->ranking }}" type="text">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ville">Ville</label>
            <div class="col-md-8 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                <select class="selectpicker form-control" name="ville" id="ville" value="{{ old('ville') ?? $university->ville }}">
                  <option>Selectionnez la ville</option>
                  @foreach ($ville as $element)
                  <?php $element = substr($element,1,-1) ?>
                  <option value="{{ $element }}" {{ ($element==$university->ville) ? 'selected="selected"' : '' }}>{{ $element }}</option>
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
              <textarea name="details" id="details" cols="100" rows="10">
                {{ old('details') ?? $university->details }}
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
        <a href="{{ route('universities.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>