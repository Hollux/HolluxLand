
// fais apparaitre string du select Autre
var autoShowHideOtherInput = function () {
    $('select[class~="select-other"]').each(function() {
        $(this).on('change', function () {
            if ($(this).val() != 'Autre')
                $('[data-parent="'+$(this).data('other')+'"]').each(function() {
                    $(this).hide();
                    $('label[for="'+$(this).prop('id')+'"]').hide();
                    this.value="";
                });
            else
                $('[data-parent="'+$(this).data('other')+'"]').each(function() {
                    $(this).show();
                    $('label[for="'+$(this).prop('id')+'"]').show();
                });
        });
        $(this).change();
    });
};
autoShowHideOtherInput();

var autoShowHideMoreInformation = function() {
    $('select[class~="select-more"]').each(function() {
        $(this).on('change', function () {
            if ($(this).val() != 'Non testé') {
                $('[data-parent="' + $(this).data('more') + '"]').each(function () {
                    $(this).show();
                    $('label[for="' + $(this).prop('id') + '"]').show();
                });
            }
            else
                $('[data-parent="'+$(this).data('more')+'"]').each(function() {
                    $(this).hide();
                    $('label[for="'+$(this).prop('id')+'"]').hide();
                    this.value="";
                });
        });
        $(this).change();
    });
};
autoShowHideMoreInformation();