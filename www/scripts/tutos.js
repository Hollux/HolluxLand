jQuery('code').each(function () {
    if($(this).hasClass('language-markup'))
    {
        jQuery('<div class="panel-body">' + jQuery(this).html() + '</div>').insertAfter(jQuery(this).closest('.panel-heading'));
        jQuery(this).html(jQuery(this).html().replace(/\</g, '&lt;').replace(/\>/g, '&gt;'));
    }
});

function onSubmit(token) {
    jQuery('.g-recaptcha-response').prop('value', token);
    jQuery('.g-recaptcha').closest('form').submit();
}
