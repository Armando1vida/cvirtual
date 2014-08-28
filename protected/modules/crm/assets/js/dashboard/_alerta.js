
$(function() {
    $(document).ready(function() {

        $("#alertaall").click(function() {
            url = "?leido=all";
            $(location).attr('href', url);
        });

        $("#notificaciones").click(function() {
            $("#numeronotificaciones").html("");
        });
        
    });
});
