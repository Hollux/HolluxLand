$(document).on('change', '#vet_form_test_region, #vet_form_test_departement', function () {

    let $field = $(this)
    let $regionField = $('#vet_form_test_region')
    let $form = $field.closest('form')
    let target = '#' + $field.attr('id').replace('departement', 'ville').replace('region', 'departement')
    // Les données à envoyer en Ajax
    let data = {}
    data[$regionField.attr('name')] = $regionField.val()
    data[$field.attr('name')] = $field.val()
    // On soumet les données
    $.post($form.attr('action'), data).then(function (data) {
        console.log('t');
        // On récupère le nouveau <select>
        let $input = $(data).find(target)
        // On remplace notre <select> actuel
        $(target).replaceWith($input)
    })
})