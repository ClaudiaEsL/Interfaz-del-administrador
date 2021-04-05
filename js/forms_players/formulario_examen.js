$(document).ready(function(){
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;
    $(".next-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
        setProgressBarValue(++form_count);
    });
    $(".previous-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
        setProgressBarValue(--form_count);
    });
    setProgressBarValue(form_count);
    function setProgressBarValue(value){
        var percent = parseFloat(100 / total_forms) * value;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");
    }
    // Handle form submit and validation
    $( "#register_form" ).submit(function(event) {
        var error_message = '';
        if(!$("#date").val()) {
            error_message+="Porfavor rellene todos los campos en el paso 1";
        }
        // Paso 2
        if(!$("#psicologo").val() || !$("#eleccion").val() 
            || !$("#rapidez").val() || !$("#efect_tactica_mental").val() || !$("#observaciones").val()){
            error_message+="<br>Porfavor rellene todos los campos en el paso 2";
        }
        // Paso 3
        if(!$("#preparador").val() || !$("#estatura").val() 
            || !$("#peso").val() || !$("#pulso").val() || !$("#control_vista").val()
            || !$("#postura").val() || !$("#articulaciones").val() || !$("#resistencia").val()
            || !$("#flexibilidad").val() || !$("#tension_arterial").val()){
            error_message+="<br>Porfavor rellene todos los campos en el paso 3";
        }
        // Paso 4
        if(!$("#medico").val() || !$("#enfermedades_f").val() 
            || !$("#enfermedades").val() || !$("#cirugias").val() || !$("#alergias").val()
            || !$("#lesiones").val() || !$("#medicamentos").val()){
            error_message+="<br>Porfavor rellene todos los campos en el paso 4";
        }
        // Display error if any else submit form
        if(error_message) {
            $('.alert-success').removeClass('hide').html(error_message);
            return false;
        } else {
            return true;
        }
    });
});