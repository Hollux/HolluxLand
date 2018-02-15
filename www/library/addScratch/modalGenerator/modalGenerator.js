$(function(){
	/*********** Plugin to display a bootstrap modal (BS 3.0->3.3.7) ********/
	// (object) params
	// List of params :
	// (string) id 			id of the modal
	// (string) title 		title of the modal
	// (string) size 		define the size (small, medium, large)
	// (string) backdrop	        set the backdrop
	// (bool)   newModal	        if true, create a new modal, dont close/erase previous modal
	// (object) inputs		if needed, gen a form with this inputs (plugin genForm)
        // (object) formData    	if needed, set the form parameters
	// (string) view 		If needed, load the view entered
	// (object) viewParams		List of params sended to load view
	// (object) buttons 		List of the buttons attached to the modal
	//				(string) type 		type of the button, define the class
	//				(string) class 		free additional class
	//				(string) name		Surcharge button name
	//				(bool)	 hide		Display button or not
	//				(function) action 	if action is 'close' the button will close the modal, otherwise execute the function
	// (object)	events 		List of the events (close, open)
	// (function)		Execute the function
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
	        if(newModal &&  $('#' + id).length > 0) {
	            $('#' + id).remove();
	        }

	        if($('.automodal').length > 0 && !newModal) { // la modale existe
	            exist = true;
                if($('.automodal').length > 1) {
                    var $modal = $('#' + id).attr({id: id});    
                } else {
                    var $modal = $('.automodal').attr({id: id});
                }	            
	            var $modalDialog = $modal.children('.modal-dialog');
	            var $modalContent =  $modalDialog.children('.modal-content');
	            var $modalBody =  $modalContent.children('.modal-body').empty();
	        } else {
	            var $modal = $('<div />').addClass('automodal modal fade').attr({id: id, 'aria-hidden': 'true'});
	            var $modalDialog = $('<div />').addClass('modal-dialog');
	            var $modalContent =  $('<div />').addClass('modal-content');
	            var $modalBody =  $('<div />').addClass('modal-body');
	        }
	        
            if(params.title !== '') {
                 
                if(exist && !newModal && $modalContent.children('.modal-header').length > 0) {
                    var $modalHeader = $modalContent.children('.modal-header').show();
                    $modalHeader.children('h4').text(params.title);
                } else {
                    var $btnHeader = $('<button />').attr({'aria-hidden': 'true', 'data-dismiss': 'modal', type: 'button' }).addClass('close').text('x');
                    var $titleHeader = $('<h4 />').addClass('modal-title').text(params.title);       
                    var $modalHeader = $('<div />').addClass('modal-header').append($btnHeader).append($titleHeader);
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
                    var $modalFooter = $('<div />').addClass('modal-footer');
                }
                
                $.each(params.buttons, function (k, v) {
                    var hide = (v.hide !== undefined && v.hide !== '') ? v.hide : false;
                    var buttonName = (v.name !== undefined && v.name !== '') ? v.name : k;
                    var btnType = (v.type !== undefined) ? v.type : 'white';
                    var otherClass = (v.class !== undefined) ? v.class : '';
                    var $btn = $('<a />').addClass('btn btn-sm btn-' + btnType + ' ' + otherClass).text(buttonName).attr('href', 'javascript:;');
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
                $('body').append($modal);
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

            $('#' + id).modal({
                backdrop: backdrop
            });
            
            $('#' + id).on('hidden.bs.modal', function (e) {
                $('#' + id).unbind();
                $('#' + id).children('.modal-body').empty();
                if( params.events !== null) {
                    if(typeof params.events.close === 'function') {
                        params.events.close();
                    }
                }
            });
            
            // Gestion des events (uniquement le open et close pour l'instant)
            if( params.events !== null) {
                if(params.view == '' && typeof params.events.open === 'function') {
                    $('#' + id).on('shown.bs.modal', params.events.open);
                }
                if(typeof params.events.close === 'function') {
                    $('#' + id).on('hide.bs.modal', params.events.close);
                }
            }
	        
	    };
	})(jQuery);
});