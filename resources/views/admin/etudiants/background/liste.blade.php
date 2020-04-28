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
                <th>Rule</th>
                <th>Photo</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($user as $utilisateur) 
              <tr> 
                <td align="center">
                  <form action="{{ route('users.destroy',$utilisateur) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $utilisateur->id }}?');">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="sup" class="btn btn-danger">
                  </form>
                </td>
                <td class="hidden-xs">{{ $utilisateur->id }}</td>
                  <td>{{ $utilisateur->name }}</td>
                  <td>{{ $utilisateur->email }}</td>
                  <td>{{ $utilisateur->droit_user }}</td>
                  <td>{{ $utilisateur->photo }}</td>
                  <td>{{ $utilisateur->created_at }}</td>
                  <td>{{ $utilisateur->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 

@stop
