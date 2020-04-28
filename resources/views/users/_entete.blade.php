<?php $facs = App\Models\University::all(); ?>
<?php $bourses = App\Models\Bourse::all(); ?>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="offer offer-danger">
          <div class="shape">
            <div class="shape-text">
              <span class="glyphicon glyphicon glyphicon-eye-open"></span>                            
            </div>
          </div>
          <div class="offer-content">
            <h3 class="lead">Applis : <label class="label label-danger"> {{ (numberApplication()) ?? 0 }}</label></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="offer offer-success">
          <div class="shape">
            <div class="shape-text">
              <span class="glyphicon glyphicon glyphicon-th"></span>
            </div>
          </div>
          <div class="offer-content">
            <h3 class="lead">Facs : <label class="label label-success"> {{ count($facs) }}</label></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="offer offer-info">
          <div class="shape">
            <div class="shape-text">
              <span class="glyphicon  glyphicon-home"></span>                         
            </div>
          </div>
          <div class="offer-content">
            <h3 class="lead">Bourses : <label class="label label-info"> {{ count($bourses) }}</label></h3>
          </div>
        </div>
      </div>
    </div>