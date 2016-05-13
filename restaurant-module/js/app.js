$(".button-collapse").sideNav();

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});

$('#textarea1').val('Opmerking');
$('#textarea1').trigger('autoresize');


$('i.close').on('click', function(){

    $(this).parents(':eq(1)').animate({
        left: "-300px"
    }, 150, "easeOutBounce").fadeOut(150, function(){
        $(this).remove();
    });

});