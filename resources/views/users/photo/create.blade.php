@extends('layouts.app')

@section('title', 'Add Contacts')

@section('content')
<div>
    @include('flash::message')

    <!-- Start Page Content -->
    <div class="sms_heading">
        <h3><i class="fa fa-at"></i> Ajouter une photo à son profil</h3>
    </div>
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="upload-contacts">
            <form action="{{ route('upload-file', $group) }}" class="form-horizontal form-bordered" id="upload-contacts" method="post" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-9 col-md-6">
                        <input type="file" class="filestyle" id="filename" name="filename" data-buttonText="Browse">
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-12 col-md-12">
                                <button class="btn btn-info" type="submit"><i class="fa fa-upload"></i> Upload Contacts File</button>
                            </div>
                        </div>
                    </div>
                </div>                    
            </form>
        </div>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- End Page Content -->  
</div>
@stop