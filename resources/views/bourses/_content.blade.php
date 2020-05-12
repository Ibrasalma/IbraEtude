<link rel="stylesheet" href="{{ asset('/css/tab.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
          <!-- Nav tabs -->
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tous" aria-controls="tous" role="tab" data-toggle="tab"><span>Toutes les bourses</span></a></li>
                    @foreach ($categorie as $element)
                    <?php $element = substr($element,1,-1) ?>
                    <li role="presentation" class=""><a href="#{{ $element }}" aria-controls="{{ $element }}" role="tab" data-toggle="tab"><span>{{ $element }}</span></a></li>
                    @endforeach
                </ul>
            
            <!-- Tab panes  in active-->
            
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tous">
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
                                        <th>Université</th>
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
                                                $university = App\Models\Bourse::find($b->id)->university->name;
                                                $programme = App\Models\Bourse::find($b->id)->programme->name;
                                            ?>
                                            <th>{{ $b->name }}</th>
                                            <th>{{ $programme }}</th>
                                            <td>{{ $b->duree }}</td>
                                            <td>{{ $b->date_entree }}</td>
                                            <td>{{ $university }}</td>
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
                    <?php 
                        for ($i = 0; $i < count($categorie);$i++)
                        {
                            $cat = $categorie[$i];
                            $cat = substr($cat,1,-1);

                            //dd($cat);
                            $sort = App\Models\Bourse::where('categorie',$cat)->get();
                            //dd($sort);
                            ?>
                           
                    <div class="tab-pane fade {{-- ($i==0) ? 'in active' : '' --}}" id="{{ $cat }}">
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
                                        <th>Université</th>
                                        <th>Frais scolaire</th>
                                        <th>Stipend</th>
                                        <th>Places</th>
                                        <th>Frais</th>
                                        <th>Appliquer</th>
                                    </tr>
                                </thead>
                                <!--Table head-->
                                <!--Table body-->
                                <tbody>
                                  <?php  for ($g = 0; $g < count($sort);$g++)
                            { 
                                $sortened = $sort[$g];
                                $university = App\Models\Bourse::find($sortened->id)->university->name;
                                                $programme = App\Models\Bourse::find($sortened->id)->programme->name;
                                ?>
                                        <tr>
                                            <th>{{ $sortened->name }}</th>
                                            <th>{{ $programme }}</th>
                                            <td>{{ $sortened->duree }}</td>
                                            <td>{{ $sortened->date_entree }}</td>
                                            <td>{{ $university }}</td>
                                            <td><strong>Etude:</strong>{{ $sortened->tuition }}<br><strong>Logement:</strong>{{ $sortened->accomodation }}</td>
                                            <td>{{ stipend($sortened) }}</td>
                                            <td>{{ $sortened->nbre_place }}</td>
                                            <td>{{ $sortened->frais }}</td>
                                            <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <a class="btn btn-primary" href="{{ route('bourses.show',$sortened->id) }}">Postuler</a>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <!--Table body-->
                            </table>
                            </div>
                        <!--Table-->
                        </div>
                    </div>
                    <?php      
                            
                        }
                    ?>
                </div>
            </div> 
        </div>
    </div>
</div>