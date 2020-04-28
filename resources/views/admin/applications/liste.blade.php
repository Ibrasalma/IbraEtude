@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')
  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $application->count() }}{{ Str::plural(' application',$application->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('applications.create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th class="hidden-xs">ID</th>
                <th>Code</th>
                <th>Etudiant</th>
                <th>Statut</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($application as $appli) 
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                   <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('applications.edit',['application'=>$appli->id]) }}" ><em class="glyphicon glyphicon-pencil"></em></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('applications.destroy',$appli) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $appli->code }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>  
                    </form>
                </td>
                <td class="hidden-xs">{{ $appli->id }}</td>
                  <td>{{ $appli->code }}</td>
                  <td>{{ $appli->etudiant_id }}</td>
                  <td>{{ $appli->statut }}</td>
                  <td>{{ $appli->created_at }}</td>
                  <td>{{ $appli->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 

@stop
