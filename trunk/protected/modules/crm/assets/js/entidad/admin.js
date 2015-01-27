
/**
 * Acciones Rating
 * Esta funcion carga el rating al momento de volver a cargar el grid
 * para mostrar en el paginado
 * @autor Diego Echeverria
 * @returns {undefined}
 */

function ratingCargaGrid() {

    $('div .star-rating').on('mouseover', function () {
        $('div .rating-cancel').hide();

    });
    $('div .star-rating').on('mouseleave', function () {
        $('div .rating-cancel').hide();
    });

    $('span .star-rating').on('click', function () {

        var str = $(this).attr('id');
        var res = str.split('_');
        rating(res[1]);

    });
}

function rating(id) {
    var cont = 0;
//    console.log($('#rating_' + id + ' div'));
    $('#rating_' + id + ' div').each(function (index, elemento) {
        if ($(elemento).hasClass('star-rating-on')) {
            cont++;
        }
    });
    $('#rating_' + id + ' div').parent().removeClass('star-rating-on');//star-rating-hover
    $('#rating_' + id + ' div').parent().addClass('star-rating-hover');//star-rating-hover
    $.ajax(
            {
                type: "POST",
                url: 'rating',
                data: {id: id, cont: cont}
            }
    );

}

