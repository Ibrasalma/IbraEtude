@extends('admin.layouts.application',['title'=>'Utilisateurs'])

<link rel="stylesheet" href="{{ asset('/css/admin/list_user.css') }}">

@section('content')
  
    <div class="col-md-10 content">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Il y'a {{ $message->count() }}{{ Str::plural(' message',$message->count())}}</h3>
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
                <th>Message</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr> 
            </thead>
            <tbody>
              @foreach ($message as $contact) 
              <tr> 
                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <form action="{{ route('contact.destroy',$contact) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $contact->id }}?');">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </p>
                </td>
                <td class="hidden-xs">{{ $contact->id }}</td>
                  <td>{{ $contact->name }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->message }}</td>
                  <td>{{ $contact->created_at }}</td>
                  <td>{{ $contact->update_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 

@stop
