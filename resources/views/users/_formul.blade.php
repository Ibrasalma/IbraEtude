    <ul class="panel list-group">
        <li class="panel-heading">
            <form action="{{ route($rue)  }}" class="form-horizontal form-bordered" id="upload-contacts" method="post" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="text" name="application" value="{{ $identifiant }}" readonly="" hidden="">
                <div class="col-xs-6 col-md-2 col-md-2 label-group">
                    <label for="filename">{{ $nom }}</label>
                </div>
                <div class="col-xs-12 col-md-6 col-md-6">
                    <div class="form-group">
                        <input type="file" class="filestyle" id="filename" name="filename" onclick="" data-buttonText="Browse">
                    </div>
                </div>
                <div class="col-xs-6 col-md-1 col-sm-1">
                    <div class="form-group">
                        <button class="btn btn-info" type="submit" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);"><i class="fa fa-upload"></i>Ajouter</button>
                        <script>
                            /**
                             * Module for displaying "Waiting for..." dialog using Bootstrap
                             *
                             * @author Eugene Maslovich <ehpc@em42.ru>
                             */

                            var waitingDialog = waitingDialog || (function ($) {
                                'use strict';

                                // Creating modal dialog's DOM
                                var $dialog = $(
                                    '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
                                    '<div class="modal-dialog modal-m">' +
                                    '<div class="modal-content">' +
                                        '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
                                        '<div class="modal-body">' +
                                            '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
                                        '</div>' +
                                    '</div></div></div>');

                                return {
                                    /**
                                     * Opens our dialog
                                     * @param message Custom message
                                     * @param options Custom options:
                                     *                options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
                                     *                options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
                                     */
                                    show: function (message, options) {
                                        // Assigning defaults
                                        if (typeof options === 'undefined') {
                                            options = {};
                                        }
                                        if (typeof message === 'undefined') {
                                            message = 'Loading';
                                        }
                                        var settings = $.extend({
                                            dialogSize: 'm',
                                            progressType: '',
                                            onHide: null // This callback runs after the dialog was hidden
                                        }, options);

                                        // Configuring dialog
                                        $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
                                        $dialog.find('.progress-bar').attr('class', 'progress-bar');
                                        if (settings.progressType) {
                                            $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
                                        }
                                        $dialog.find('h3').text(message);
                                        // Adding callbacks
                                        if (typeof settings.onHide === 'function') {
                                            $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
                                                settings.onHide.call($dialog);
                                            });
                                        }
                                        // Opening dialog
                                        $dialog.modal();
                                    },
                                    /**
                                     * Closes dialog
                                     */
                                    hide: function () {
                                        $dialog.modal('hide');
                                    }
                                };

                            })(jQuery);

                        </script>
                    </div>
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-12 field">
                @foreach ($releve as $element)
                    <?php $e = image($element) ?>
                    <div class="col-md-2">
                        <div class="attach-image" attachid="693704688">
                            <a href="{{ $e }}" onclick="return false;"><img class="avatar img-rectangle img-thumbnail" style="max-height: 100px;" src="{{ $e }}" class="attach showimgs">
                                <span>{{ $donnee }}</span>
                            </a>
                                <span>
                                    <p>
                                        <form action="{{ route($delete,$element->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer  :{{ $element->name }}?');">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </p>
                                </span>
                            
                        </div>
                    </div>
                @endforeach    
                </div>
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
       </li> 
    </ul>