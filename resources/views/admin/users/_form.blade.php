<tr>
  <td colspan="1">
    <div class="well form-horizontal">
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="fullName">Username</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="name" placeholder="Username" class="form-control" required="true" value="{{ old('name') ?? $user->name }}" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="email" name="email" placeholder="User Email" class="form-control" required="true" value="{{ old('email') ?? $user->email }}" type="email">
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
          <label class="col-md-4 control-label" for="password">Password</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="password" name="password" placeholder="Password" class="form-control" required="true" value="{{ old('password') ?? $user->password }}" type="password">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="confirmPassword">Confirm Password</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" class="form-control" required="true" type="password" value="{{ old('password_confirmation') ?? $user->password }}">
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
          <label class="col-md-4 control-label">Règles</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
              <select class="selectpicker form-control" name="droit_id">
                <option>Selectionnez la règle</option>
                @foreach ($utilisateur as $droit)
                  <option value="{{ $droit->id }}" {{ ($droit->id==$user->droit_id) ? 'selected="selected"' : '' }}>{{ $droit->signification }}</option>
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
        <a href="{{ route('users.index') }}" class="btn btn-success btn-block">Annuler la création</a>
      </div>
    </fieldset>
  </td>
</tr>
