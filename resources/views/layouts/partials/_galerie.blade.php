
            <?php $ville1 = App\Models\University::where('ville',$ville)->get();?>
            @foreach ($ville1 as $v)
                <?php $gallerie1 = App\Models\Galerie::where('university_id',$v->id)->get();?>
                @foreach ($gallerie1 as $g)
                    <?php $gal = image($g); ?>
                    <div class="gallery_product col-sm-3 col-xs-6 filter {{ $ville }}">
                        <a rel="ligthbox" href="{{ $gal }}">
                            <img class="img-responsive avatar img-rectangle" style="max-height: 200px;" alt="" src="{{ $gal }}" />
                            <div class='img-info'>
                                <h4>{{ $g->description }} </h4>
                                <p>{{ $v->nom }}</p>
                            </div>
                        </a>
                    </div> 
                @endforeach
            @endforeach
            
