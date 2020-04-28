@extends('layouts.app',['fichier'=>$fichier])

<link rel="stylesheet" href="{{ asset('/css/user.css') }}">

@section('content')
<div class="col-md-9">
  @include('users._entete')
  <div class="row">
    <div class="container" style="padding-top: 130px;">
      <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading text-center">
          <strong>Liste de mes etudiants</strong>
        </div>
        <div class="panel-body">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>nom</th>
                      <th>prenom</th>
                      <th>passeport</th>
                      <th>nationalité</th>
                      <th>Gender</th>
                      <th>occupation</th>
                      <th>statut</th>
                      <th>diplome</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    @foreach ($etudiant as $e)
                    <tr>
                      
                        <td>{{ $e->id }}</td>
                        <td>{{ $e->family_name }}</td>
                        <td>{{ $e->given_name }}</td>
                        <td>{{ $e->passport_number }}</td>
                        <td>{{ $e->nationality }}</td>
                        <td>{{ $e->gender }}</td>
                        <td>{{ $e->occupation }}</td>
                        <td>{{ $e->marital_status }}</td>
                        <td>{{ $e->highest_degree }}</td>
                        <td>
                          <p data-placement="top" data-toggle="tooltip" title="Edit">
                            <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('application_step1') }}" >Editer</a>
                          </p>
                        </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <th colspan="10">
                      <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('application_step1') }}">Ajouter</a>
                      </div>
                    </th>
                  </tfoot>
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
</div>
@stop