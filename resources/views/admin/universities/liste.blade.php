@extends('admin.layouts.application',['title'=>'Programmes'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content') 
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $university->count() }}{{ Str::plural(' university',$university->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('universities.create') }}">Créer un {{ $titre }}</a></li>
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
                <th>Slogan</th>
                <th>Code</th>
                <th>Ville</th>
                <th>Province</th>
                <th>Ranking</th>
                <th>Wechat</th>
                <th>Website</th>
                <th>Details</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($university as $univers)
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('universities.edit',$univers->id) }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('universities.destroy',$univers->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $univers->id }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                  <td class="hidden-xs">{{ $univers->id }}</td>
                  <td>{{ $univers->name }}</td>
                  <td>{{ $univers->slogan }}</td>
                  <td>{{ $univers->code }}</td>
                  <td>{{ $univers->ville }}</td>
                  <td>{{ $univers->province }}</td>
                  <td>{{ $univers->ranking }}</td>
                  <td>{{ $univers->wechat }}</td>
                  <td>{{ $univers->website }}</td>
                  <td>{{ $univers->details }}</td>
                  <td>{{ $univers->created_at }}</td>
                  <td>{{ $univers->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@stop

