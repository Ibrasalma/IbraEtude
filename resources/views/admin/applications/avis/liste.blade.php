@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')
  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $avi->count() }}{{ Str::plural(' avi',$avi->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('avis.create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th class="hidden-xs">ID</th>
                <th>Utilisateur</th>
                <th>Bourse</th>
                <th>Avi</th>
                <th>Approuved</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($avi as $a) 
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('avis.edit',$a->id) }}" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('avis.destroy',$a->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $a->avi }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                <td class="hidden-xs">{{ $a->id }}</td>
                  <td>{{ $a->user_id }}</td>
                  <td>{{ $a->bourse_id }}</td>
                  <td>{{ $a->avi }}</td>
                  <td>{{ $a->approuved }}</td>
                  <td>{{ $a->created_at }}</td>
                  <td>{{ $a->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 

@stop
