@extends('admin.layouts.application',['title'=>'Programmes'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $etudiant->count() }}{{ Str::plural(' etudiant',$etudiant->count())}}</h3>
            </div>
            <ul class="nav pull-right">
              <li><a class="btn btn-primary" href="{{ route('stories.create') }}">Créer un {{ $titre }}</a></li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th class="hidden-xs">ID</th>
                <th>User</th>
                <th>Family Name</th>
                <th>Firstname</th>
                <th>Passeport</th>
                <th>Expiration</th>
                <th>Nationality</th>
                <th>Birthday</th>
                <th>Birthplace</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Occupation</th>
                <th>Affiliated</th>
                <th>Dernier diplome</th>
                <th>Religion</th>
                <th>Mobile</th>
                <th>Adresse</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Hobbies</th>
                <th>En Chine</th>
                <th>Etudier Chine</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($etudiant as $student)
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                   <a class="btn btn-primary btn-xs" data-title="Edit" href="{{ route('stories.edit',['story'=>$student]) }}" ><em class="glyphicon glyphicon-pencil"></em></a>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('stories.destroy',$student) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $student->id }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>  
                    </form>
                  </p>
                </td>
                <td class="hidden-xs">{{ $student->id }}</td>
                <td>{{ $student->user_id }}</td>
                <td>{{ $student->family_name }}</td>
                <td>{{ $student->given_name }}</td>
                <td>{{ $student->passport_number }}</td>
                <td>{{ $student->passport_expire }}</td>
                <td>{{ $student->nationality }}</td>
                <td>{{ $student->birthday }}</td>
                <td>{{ $student->birthplace }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->marital_status }}</td>
                <td>{{ $student->occupation }}</td>
                <td>{{ $student->affiliated }}</td>
                <td>{{ $student->highest_degree }}</td>
                <td>{{ $student->relligion }}</td>
                <td>{{ $student->mobile }}</td>
                <td>{{ $student->adresse }}</td>
                <td>{{ $student->pays }}</td>
                <td>{{ $student->ville }}</td>
                <td>{{ $student->code_postal }}</td>
                <td>{{ $student->hobbies }}</td>
                <td>{{ $student->is_in_china }}</td>
                <td>{{ $student->studied_china }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@stop

