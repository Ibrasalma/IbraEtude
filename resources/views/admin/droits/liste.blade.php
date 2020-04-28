@extends('admin.layouts.application',['title'=>'Programmes'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $droit->count() }}{{ Str::plural(' droit',$droit->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('droits.create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
      <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th><em class="fa fa-cog"></em></th>
            <th>ID</th>
            <th>Signification</th>
          </tr>
        </thead>
        <tbody>
        
          @foreach ($droit as $d)
          <tr> 
            <td>
              <p data-placement="top" data-toggle="tooltip" title="Edit">
                <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('droits.edit',['droit'=>$d]) }}" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></a>
              </p>
              <p data-placement="top" data-toggle="tooltip" title="Delete">
                <form action="{{ route('droits.destroy',$d) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer le droit :{{ $d->signification }}?');">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                </form>
              </p>
            </td>
            <td class="hidden-xs">{{ $d->id }}</td>
              <td>{{ $d->signification }}</td>
            </tr>
            @endforeach
        
        </tbody>
      </table>
    </div>
  </div></div>
@stop

