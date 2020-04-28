@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/user.css') }}">

@section('content')
<div class="col-md-9">
  @include('users._entete')
  <div class="row">
    <div class="container" style="padding-top: 130px;">
      <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading text-center">
          <strong>Liste de mes applications</strong>
        </div>
        <div class="panel-body">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>code</th>
                      <th>etudiant</th>
                      <th>diplome</th>
                      <th>filiere</th>
                      <th>statut</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <tr>
                        <td>{{ $code }}</td>
                        <td>{{ $nom }}</td>
                        <td>{{ $diplome }}</td>
                        <td>{{ $filiere }}</td>
                        <td>{{ $status }}</td>
                        <td>
                          <?php use Illuminate\Support\Str; ?>
                          @if (Str::contains($status,'nonsoumis'))
                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                              <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('application_step1') }}" >Editer</a>
                            </p>
                          @endif
                          
                          <p data-placement="top" data-toggle="tooltip" title="Delete">
                            <form id="application" action="{{ route('application.visualiser') }}" method="POST">
                              @csrf
                              <input name="application" type="text" value="{{ $id }}" readonly="" hidden="">
                              <button class="btn btn-success btn-xs" type="submit">Voir</button>
                            </form>
                          </p>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--/table-resp-->
            </div>
          </div>
        </div>   
      </div>
    </div>
  </div>
</div>
</div>
@stop