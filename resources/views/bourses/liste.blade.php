@extends('layouts.default',['title'=>'Bourses'])


@section('content')

<link rel="stylesheet" href="{{ asset('/css/bourse.css') }}">
@include('layouts.partials._tete',['nom'=>'Liste des bourses','name'=>'étudier en Chine'])

@include('layouts.partials._nav_forum')

@include('bourses._content')
   
@stop

