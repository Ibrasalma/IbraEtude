@extends('admin.layouts.application',['title'=>'Programmes'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $programme->count() }}{{ Str::plural(' programme',$programme->count())}}</h3>
            </div>
            <ul class="nav pull-right">
            	<li><a class="btn btn-primary" href="{{ route('programmes.create') }}">Créer un {{ $titre }}</a></li>
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
                <th>Durée</th>
                <th>Niveau</th>
                <th>Langue</th>
                <th>Prerequis</th>
                <th>Domaine</th>
                <th>Tuition</th>
                <th>Accomodation</th>
                <th>Detail</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($programme as $prog)
              	
              	<tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
					         <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('programmes.edit',['programme'=>$prog]) }}" ><em class="glyphicon glyphicon-pencil"></em></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
  	                <form action="{{ route('programmes.destroy',$prog) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $prog->name }}?');">
  	                  {{ csrf_field() }}
  	                  {{ method_field('DELETE') }}
  	                  <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>  
  	                </form>
                </td>
                <td class="hidden-xs">{{ $prog->id }}</td>
                  <td>{{ $prog->name }}</td>
                  <td>{{ $prog->duration }}</td>
                  <td>{{ $prog->degree }}</td>
                  <td>{{ $prog->language }}</td>
                  <td>{{ $prog->requirement }}</td>
                  <td>{{ $prog->domaine }}</td>
                  <td>{{ $prog->tuition }}</td>
                  <td>{{ $prog->accomodation }}</td>
                  <td>{{ $prog->details }}</td>
                  <td>{{ $prog->created_at }}</td>
                  <td>{{ $prog->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@stop

