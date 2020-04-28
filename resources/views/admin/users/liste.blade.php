@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')
  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $user->count() }}{{ Str::plural(' utilisateur',$user->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('users.create') }}">Créer un {{ $titre }}</a></li>
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
                <th>Email</th>
                <th>UserName</th>
                <th>Rule</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($user as $utilisateur) 
              <tr> 
                <td >
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('users.edit',['user'=>$utilisateur->id]) }}" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('users.destroy',$utilisateur->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer l\'utilisateur :{{ $utilisateur->name }} ?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                <td class="hidden-xs">{{ $utilisateur->id }}</td>
                <?php $droit = App\Models\User::find($utilisateur->id)->droit; ?>
                  <td>{{ $utilisateur->name }}</td>
                  <td>{{ $utilisateur->email }}</td>
                  <td>{{ $utilisateur->username }}</td>
                  <td>{{ $droit->signification }}</td>
                  <td>{{ $utilisateur->created_at }}</td>
                  <td>{{ $utilisateur->updated_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop