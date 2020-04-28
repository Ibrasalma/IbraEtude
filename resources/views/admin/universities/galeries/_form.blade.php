<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <input type="file" class="filestyle" id="filename" name="filename" data-buttonText="Browse">
            {!! $errors->first('filename','<span class="help">:message</span>') !!}
          </div>
        </div>
      </fieldset>
    </div>
  </td>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group {{ $errors->has('univ_id') ? 'has-error' : '' }}">
          <label class="col-md-4 control-label" for="university">Université</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="univ_id">
                <option>Selectionnez la fac</option>
                @foreach ($university as $fac)
                  <option value="{{ $fac->id }}" {{ ($fac->id==$galery->university_id) ? 'selected="selected"' : '' }}>{{ $fac->code }}</option>
                @endforeach
              </select>
              {!! $errors->first('univ_id','<span class="help">:message</span>') !!}
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
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
          <label class="col-md-1 control-label" for="details">Description</label>
          <div class="col-md-11 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <textarea name="description" id="details" cols="100" rows="5">
                {{ old('description') ?? $galery->description }}
              </textarea>
            </div>
          </div>
          {!! $errors->first('description','<span class="help">:message</span>') !!}
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
        <a href="{{ route('galeries.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>