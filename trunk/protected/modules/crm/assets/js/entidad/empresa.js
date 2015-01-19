$(function() {
    obtenerInformacionEmpresa();
});
function obtenerInformacionEmpresa()
{
//    var informacionEntidad;
//    var informacionEntidad2 = new Array();
    $.ajax({
        type: "POST",
        url: baseUrl + 'crm/direccion/ajaxGetInformacionEmpresa',
        dataType: 'json',
        data: {
//            $tipo_entidad, $entidad_id
            tipo_entidad: "EMPRESA", entidad_id: entidad_id
        },
        success: function(data) {
//informacionEntidad=data;
//            informacionEntidad = new Array(data[0].id, data[0].calle_principal, data[0].calle_secundaria, data[0].pais, data[0].provincia, data[0].ciudad, data[0].latitud, data[0].longitud);
//            informacionEntidad [0] = data[0].id;
//            informacionEntidad [1] = data[0].calle_principal;
//            informacionEntidad [2] = data[0].calle_secundaria;
//            informacionEntidad [3] = data[0].pais;
//            informacionEntidad [4] = data[0].provincia;
//            informacionEntidad [5] = data[0].ciudad;
//            informacionEntidad [6] = data[0].latitud;
//            informacionEntidad [7] = data[0].longitud;
//            alert(informacionEntidad[0]);
//            informacionEntidad2 = informacionEntidad;

            if (data.length > 0) {
                var latitudX = data[0].latitud;
                var longitudY = data[0].longitud;
                initializeMap(latitudX, longitudY, 'map-canvas', null, null, false);
            }
            else
            {
//                alert("no hay datos");
                var latitudX = (0.346024);
                var longitudY = -78.119574;
                initializeMap(latitudX, longitudY, 'map-canvas', null, null, false);
            }



        },
        error: function(data) {
            var latitudX = (0.346024);
            var longitudY = -78.119574;
            initializeMap(latitudX, longitudY, 'map-canvas', null, null, false);
        }

    }
    );
}




