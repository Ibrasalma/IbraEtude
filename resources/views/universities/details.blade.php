@extends('layouts.default',['title'=>'Bourses'])

@section('content')


<link rel="stylesheet" href="{{ asset('/css/bourse.css') }}">
@include('layouts.partials._tete',['nom'=>'Details de l\'université','name'=>'Details université','valeur'=>$university->name])

<div class="container-fluid">
<link rel="stylesheet" href="{{ asset('/css/tab.css') }}">	
    <div class="col-md-8">
    <?php 
        $bourse = App\Models\University::find($university->id)->bourses;
        $image = App\Models\Galerie::where('university_id',$university->id)->get();
    ?>
		<div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><span>Details</span></a></li>
                <li role="presentation" class=""><a href="#exigences" aria-controls="exigences" role="tab" data-toggle="tab"><span>Programmes</span></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">
                    <div class="card-body">
                    	<ul class="panel list-group">
                    		<li class="list-group-item">
                                <p>
                                    {{ $university->details }}
                                </p>  
                            </li>
                    	</ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="exigences">
                    <div class="card-body">
                    	<div class="card-body">
                        <!--Table-->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                <!--Table head-->
                                    <thead class="mdb-color darken-3">
                                        <tr class="text-white">
                                            <th>Nom</th>
                                            <th>Programme</th>
                                            <th>Duree</th>
                                            <th>Date entree</th>
                                            <th>Frais scolaire</th>
                                            <th>Stipend</th>
                                            <th>Places</th>
                                            <th>Frais</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!--Table head-->
                                    <!--Table body-->
                                    <tbody>
                                        @foreach ($bourse as $b)
                                            <tr>
                                                <?php 
                                                    $programme = App\Models\Bourse::find($b->id)->programme->name;
                                                ?>
                                                <th>{{ $b->name }}</th>
                                                <th>{{ $programme }}</th>
                                                <td>{{ $b->duree }}</td>
                                                <td>{{ $b->date_entree }}</td>
                                                <td><strong>Etude:</strong>{{ $b->tuition }}<br><strong>Logement:</strong>{{ $b->accomodation }}</td>
                                                <td>{{ stipend($b) }}</td>
                                                <td>{{ $b->nbre_place }}</td>
                                                <td>{{ $b->frais }}</td>
                                                <td> 
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                        <a class="btn btn-primary" href="{{ route('bourses.show',$b->id) }}">Postuler</a>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--Table body-->
                                </table>
                            </div>
                        <!--Table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .item {
                width: 200px;
                float: left;
            }
            .item img {
                display: block;
                width: 100%;
            }
            button {
                font-size: 18px;
            }
            .container{
                width:100%;
            }
        </style>
        <div id="images">
            @forelse ($image as $gal)
                <?php $gal = image($gal) ?>
            <div class="item">
                <img src="{{ $gal }}?random">
            </div>
            @empty
                {{ 'pas d\'image' }}
            @endforelse
        </div>
	</div>
	<div class="panel panel-default col-md-4">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<ul class="panel list-group">
                <li class="list-group-item"><strong><u>Abregé:</u></strong>
                    <p>{{ $university->code }} </p>
                </li>
                <li class="list-group-item"><strong><u>Slogan:</u></strong>
                    <p>{{ $university->slogan }} </p>
                </li>
                <li class="list-group-item"><strong><u>Classement:</u></strong>
                    <p>{{ $university->ranking }} </p>
                </li>
                <li class="list-group-item "><strong><u>Province:</u></strong>
                    <p>{{ $university->province }}</p>
                </li>
                <li class="list-group-item"><strong><u>Ville:</u></strong> 
	            	<p>{{ $university->ville }}</p>
                </li>
                <li class="list-group-item"><strong><u>Site web:</u></strong>
                	<p>{{ $university->website }} </p>
                </li>
                <li class="list-group-item"><strong><u>Wechat:</u></strong>
                	<p>{{ $university->wechat }} </p>
                </li>
                <p data-placement="top" data-toggle="tooltip" title="Edit">
				</p>
            </ul> 
        </div>
    </div>
</div>
@stop
