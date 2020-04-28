            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="{{ set_active_route('application_step1') }}">
                        <a href="{{ route('application_step1') }}">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="{{ set_active_route('application_step2') }}">
                        <a href="{{ route('application_step2') }}">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="{{ set_active_route('application_step3') }}">
                        <a href="{{ route('application_step3') }}">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="{{ set_active_route('application_step4') }}">
                        <a href="{{ route('application_step4') }}">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>