@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')
  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $bourse->count() }}{{ Str::plural(' bourse',$bourse->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ url('bourses/create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th class="hidden-xs">ID</th>
                <th>Nom</th>
                <th>Categorie</th>
                <th>Programme</th>
                <th>Duree</th>
                <th>Date entree</th>
                <th>Université</th>
                <th>Tuition</th>
                <th>Accomodation</th>
                <th>Stipend</th>
                <th>Revue</th>
                <th>Detail</th>
                <th>Nbre Place</th>
                <th>Frais</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($bourse as $b) 
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('bourses.edit',$b->id) }}" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('bourses.destroy',$b->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $b->name }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                <td class="hidden-xs">{{ $b->id }}</td>
                  <td>{{ $b->name }}</td>
                  <td>{{ $b->categorie }}</td>
                  <td>{{ $b->programme_id }}</td>
                  <td>{{ $b->duree }}</td>
                  <td>{{ $b->date_entree }}</td>
                  <td>{{ $b->university_id }}</td>
                  <td>{{ $b->tuition }}</td>
                  <td>{{ $b->accomodation }}</td>
                  <td>{{ $b->stipend }}</td>
                  <td>{{ $b->revue }}</td>
                  <td>{{ $b->detail }}</td>
                  <td>{{ $b->nbre_place }}</td>
                  <td>{{ $b->frais }}</td>
                  <td>{{ $b->created_at }}</td>
                  <td>{{ $b->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 

@stop
