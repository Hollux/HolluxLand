jQuery(function(){
    (function($) {
        $.fn.genModalBS=function(params) {
            params = Object.assign({
                id: 'bs',
                title: '',
                size: 'medium',
                backdrop: 'static',
                newModal: false,
                inputs: null,
                buttons: null,
                events: null,
                view: '',
                viewParams: {}
            }, params);

            var $content = this;
            var exist = false;
            var id = 'modal' + params.id;
            var newModal = params.newModal;
            if(newModal &&  jQuery('#' + id).length > 0) {
                jQuery('#' + id).remove();
            }

            if(jQuery('.automodal').length > 0 && !newModal) { // la modale existe
                exist = true;
                if(jQuery('.automodal').length > 1) {
                    var $modal = jQuery('#' + id).attr({id: id});
                } else {
                    var $modal = jQuery('.automodal').attr({id: id});
                }
                var $modalDialog = $modal.children('.modal-dialog');
                var $modalContent =  $modalDialog.children('.modal-content');
                var $modalBody =  $modalContent.children('.modal-body').empty();
            } else {
                var $modal = jQuery('<div />').addClass('automodal modal fade').attr({id: id, 'aria-hidden': 'true'});
                var $modalDialog = jQuery('<div />').addClass('modal-dialog');
                var $modalContent =  jQuery('<div />').addClass('modal-content');
                var $modalBody =  jQuery('<div />').addClass('modal-body');
            }

            if(params.title !== '') {

                if(exist && !newModal && $modalContent.children('.modal-header').length > 0) {
                    var $modalHeader = $modalContent.children('.modal-header').show();
                    $modalHeader.children('h4').text(params.title);
                } else {
                    var $btnHeader = jQuery('<button />').attr({'aria-hidden': 'true', 'data-dismiss': 'modal', type: 'button' }).addClass('close').text('x');
                    var $titleHeader = jQuery('<h4 />').addClass('modal-title').text(params.title);
                    var $modalHeader = jQuery('<div />').addClass('modal-header').append($btnHeader).append($titleHeader);
                }

                if(!exist || $modalContent.children('.modal-header').length === 0 || newModal) {
                    $modalContent.prepend($modalHeader);
                }

            } else if(exist && !newModal) {
                $modalContent.children('.modal-header').hide();
            }

            if(params.view == '') {
                $modalBody.empty().html($content);
            }

            if(params.inputs !== null) {
                var $form = gen_form(params.inputs, (params.formData !== null ? params.formData : id), true);
                $modalBody.append($form);
            }

            if(!exist || newModal) {
                $modalContent.append($modalBody);
            }

            // On met les boutons dans le footer
            if(params.buttons !== null && params.buttons !== '') {
                if(exist && !newModal && $modalContent.children('.modal-footer').length > 0) {
                    var $modalFooter = $modalContent.children('.modal-footer');
                    $modalFooter.empty().show();
                } else {
                    var $modalFooter = jQuery('<div />').addClass('modal-footer');
                }

                $.each(params.buttons, function (k, v) {
                    var hide = (v.hide !== undefined && v.hide !== '') ? v.hide : false;
                    var buttonName = (v.name !== undefined && v.name !== '') ? v.name : k;
                    var btnType = (v.type !== undefined) ? v.type : 'white';
                    var otherClass = (v.class !== undefined) ? v.class : '';
                    var $btn = jQuery('<a />').addClass('btn btn-sm btn-' + btnType + ' ' + otherClass).text(buttonName).attr('href', 'javascript:;');
                    if(v.action === 'close') {
                        $btn.attr('data-dismiss', 'modal');
                    }
                    if(typeof v.action === 'function') {
                        $btn.on('click', v.action);
                    }
                    if(hide){
                        $btn.addClass('hide');
                    }
                    $modalFooter.append($btn);
                });
                if(!exist || newModal || $modalContent.children('.modal-footer').length === 0) {
                    $modalContent.append($modalFooter);
                }
            } else {
                if(exist && !newModal) {
                    $modalContent.children('.modal-footer').hide();
                }
            }

            // Taille de la modale
            $modalDialog.removeClass().addClass('modal-dialog');
            if(params.size === 'large') {
                $modalDialog.addClass('modal-lg');
            } else if(params.size === 'small') {
                $modalDialog.addClass('modal-sm');
            }

            if(!exist || newModal) {
                $modalDialog.append($modalContent);
                $modal.append($modalDialog);
                jQuery('body').append($modal);
            }
            var backdrop = params.backdrop;

            if(params.view !== '') {
                _loadView($content, params.view, params.viewParams, function(e, result) {
                    $modalBody.empty().html($content);
                    if(params.events !== null && typeof params.events.open === 'function') {
                        params.events.open(result);
                    }
                });
            }

            jQuery('#' + id).modal({
                backdrop: backdrop
            });

            jQuery('#' + id).on('hidden.bs.modal', function (e) {
                jQuery('#' + id).unbind();
                jQuery('#' + id).children('.modal-body').empty();
                if( params.events !== null) {
                    if(typeof params.events.close === 'function') {
                        params.events.close();
                    }
                }
            });

            // Gestion des events (uniquement le open et close pour l'instant)
            if( params.events !== null) {
                if(params.view == '' && typeof params.events.open === 'function') {
                    jQuery('#' + id).on('shown.bs.modal', params.events.open);
                }
                if(typeof params.events.close === 'function') {
                    jQuery('#' + id).on('hide.bs.modal', params.events.close);
                }
            }

        }; 
    })(jQuery);
});
