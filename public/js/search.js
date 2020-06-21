function add_pretask_satellite()
{
    temp_text = "";
    show_text = "";

    if ($("#checkbox_pretask_S1A").prop('checked')) {
        temp_text = $("#checkbox_pretask_S1A").val();

        if ($("#checkbox_pretask_stripmap").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_stripmap").val();
        }

        if ($("#checkbox_pretask_iws").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_iws").val();
        }

        show_text += temp_text;
    }

    if ($("#checkbox_pretask_S1B").prop('checked')) {
        temp_text = '\r\n' + $("#checkbox_pretask_S1B").val();

        if ($("#checkbox_pretask_stripmap").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_stripmap").val();
        }

        if ($("#checkbox_pretask_iws").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_iws").val();
        }

        show_text += temp_text;
    }

    if ($("#checkbox_pretask_ALOS-2").prop('checked')) {
        temp_text = '\r\n' + $("#checkbox_pretask_ALOS-2").val();

        if ($("#checkbox_pretask_ALOS2_Spotlight").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_ALOS2_Spotlight").val();
        }

        if ($("#checkbox_pretask_ALOS2_Ultra-Fine").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_ALOS2_Ultra-Fine").val();
        }

        if ($("#checkbox_pretask_ALOS2_High-Sensitive").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_ALOS2_High-Sensitive").val();
        }

        if ($("#checkbox_pretask_ALOS2_Fine").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_ALOS2_Fine").val();
        }

        if ($("#checkbox_pretask_ALOS2_ScanSAR").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_ALOS2_ScanSAR").val();
        }

        show_text += temp_text;
    }

    if ($("#checkbox_pretask_Radarsat-2").prop('checked')) {
        temp_text = '\r\n' + $("#checkbox_pretask_Radarsat-2").val();

        if ($("#checkbox_pretask_Radarsat2_Spotlight").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_Spotlight").val();
        }

        if ($("#checkbox_pretask_Radarsat2_Ultra").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_Ultra").val();
        }

        if ($("#checkbox_pretask_Radarsat2_WideUltra-Fine").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_WideUltra-Fine").val();
        }

        if ($("#checkbox_pretask_Radarsat2_Extra_FIne").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_Extra_FIne").val();
        }

        if ($("#checkbox_pretask_Radarsat2_Fine").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_Fine").val();
        }

        if ($("#checkbox_pretask_Radarsat2_Wide-Fine").prop('checked')) {
            temp_text += " " + $("#checkbox_pretask_Radarsat2_Wide-Fine").val();
        }

        show_text += temp_text;
    }

    $("textarea#textarea_Satellite").val(show_text);

    $('#pre-task-satellite').hide();
}

function hide_satellite(){
    $('#pre-task-satellite').hide();
    $("#Sentinel-1").hide();
    $("#Sentinel-2").hide();
    $("#Sentinel-3").hide();
    $("#satellite").val("");
}

function clear_textarea_Satellite(){
    $("textarea#textarea_Satellite").val("")
}
