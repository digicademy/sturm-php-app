// @see: http://api.jquery.com/hide/
// @see: http://api.jquery.com/show/
// @see: http://api.jquery.com/slidetoggle/

$(document).ready(function() {
    // all ol.letters are hidden first
    $('.letters').hide();

    // if a h4.year is clicked show the next ol.letters sibling
    $('.year').click(function () {
        $(this).next('.letters').slideToggle();
    });

    // if the 'show all' link is clicked, show all ol.letters (regardless if some lists are already open)
    $('#showAll').click(function () {
        $('.letters').show('slow');
    });

    // if the 'hide all' link is clicked, hide all ol.letters (regardless if some lists are already hidden)
    $('#hideAll').click(function () {
        $('.letters').hide('slow');
    });
});
