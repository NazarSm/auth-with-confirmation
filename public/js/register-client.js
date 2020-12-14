
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
    });

    $('#siret_number').on('keyup', function () {
        var id =  $('#siret_number').val();
        $.get('/get-organizations?id=' + id, function (resp) {
            if(resp){
                $('#siret_number').css('border-color', '');
                $('#company_name').val(resp)
            }else{
                $('#company_name').val('')
                $('#siret_number').css('border-color', 'red');
            }
        });
    });

    $('#categories').change(function(event) {
        if ($(this).val().length > 2) {
            $('option:selected:first').prop("selected",false)
        }
    });
});
