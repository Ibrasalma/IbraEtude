                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-12 field">
                                    <div class="col-xs-6 col-md-2 col-md-2 label-group">
                                        <label>{{ $nom }}</label>
                                    </div>
                                @foreach ($files as $element)
                                    <?php $element = image($element) ?>
                                    <div class="col-md-2">
                                        <div class="attach-image" attachid="693704688">
                                            <a href="{{ $element }}" onclick="return false;"><img class="avatar img-rectangle img-thumbnail" style="max-height: 100px;" src="{{ $element }}" class="attach showimgs"><span>{{ $donnee }}</span></a>
                                        </div>
                                    </div>
                                @endforeach    
                                </div>
                            </div>
                        </li>