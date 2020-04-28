@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $photo->count() }}{{ Str::plural(' degree',$photo->count())}} documents soumis</h3>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <th class="hidden-xs">ID</th>
                  <th>Application</th>
                  <th>Nom fichier</th>
                  <th>extension</th>
                  <th>tailler</th>
                  <th>location</th>
                  <th>visualisation</th>
                  <th>created at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($photo as $avatar) 
              <tr>
                  <td>
              <p data-placement="top" data-toggle="tooltip" title="Delete">
                <form action="{{ route('avatars.destroy',$avatar) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $avatar->id }}?');">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                </form>
              </p>
            </td>
                  <td class="hidden-xs">{{ $avatar->id }}</td>
                  <td>{{ $avatar->user_id }}</td>
                  <td>{{ $avatar->filename }}</td>
                  <td>{{ $avatar->extension }}</td>
                  <td>{{ $avatar->filesize }}</td>
                  <td>{{ $avatar->location }}</td>
                  <td>
                    <?php 
                      $image = App\Models\Degree::where('id',$avatar->id)->first()->location;
                      $element = image($element) ?>
                    <div class="col-md-2">
                      <div class="attach-image" attachid="693704688">
                        <a href="{{ $element }}" onclick="return false;"><img class="avatar img-rectangle img-thumbnail" style="max-height: 100px;" src="{{ $element }}" class="attach showimgs"><span>{{ $donnee }}</span></a>
                      </div>
                    </div>
                  </td>
                  <td>{{ $avatar->updated_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@stop
