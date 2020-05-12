    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <form action="#" method="POST">
                        <div class="col-md-1">
                            <div class="form-group">
                                <select class="form-control" name="ville">
                                    <option>Ville</option>
                                    @foreach ($ville as $element)
                                        <?php $element = substr($element,1,-1)?>
                                        <option value="{{ $element }}">{{ $element }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       <div class="col-md-1">
                            <div class="form-group">
                                <select class="form-control" name="entree">
                                    <option>Entrée</option>
                                    <option>Septembre 2020</option>
                                    <option>Mars 2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <select class="form-control" name="langue">
                                    <option>Langue</option>
                                    @foreach ($langue as $element)
                                        <?php $element = substr($element,1,-1)?>
                                        <option value="{{ $element }}">{{ $element }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="domaine">
                                    <option>Domaine</option>
                                    @foreach ($domaine as $element)
                                        <?php $element = substr($element,1,-1)?>
                                        <option value="{{ $element }}">{{ $element }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="university">
                                    <option>université</option>
                                    @foreach ($university as $element)
                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="categorie">
                                    <option>catégorie</option>
                                    @foreach ($categorie as $element)
                                        <?php $element = substr($element,1,-1)?>
                                        <option value="{{ $element }}">{{ $element }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Mot clé:</span>
                                    <input class="form-control" name="programme" placeholder="Mot clé du programme ..." type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
