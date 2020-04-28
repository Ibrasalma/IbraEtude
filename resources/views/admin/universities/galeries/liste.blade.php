@extends('admin.layouts.application',['title'=>'Programmes'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content') 
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $galery->count() }}{{ Str::plural(' galery',$galery->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('galeries.create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th class="hidden-xs">ID</th>
                <th>University</th>
                <th>Nom fichier</th>
                <th>extension</th>
                <th>taille</th>
                <th>location</th>
                <th>description</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($galery as $pic)
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('galeries.edit',$pic->id) }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('galeries.destroy',$pic->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $pic->id }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                  <td class="hidden-xs">{{ $pic->id }}</td>
                  <td>{{ $university = App\Models\Galerie::find($pic->id)->university->code }}</td>
                  <td>{{ $pic->filename }}</td>
                  <td>{{ $pic->extension }}</td>
                  <td>{{ $pic->filesize }}</td>
                  <td>{{ $pic->location }}</td>
                  <td>{{ $pic->description }}</td>
                  <td>{{ $pic->created_at }}</td>
                  <td>{{ $pic->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@stop

