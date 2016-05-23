<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script src="js/app.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();

        $('i.close').on('click', function(){
            console.log('click');
            $(this).parents(':eq(1)').animate({
                left: "-300px"
            }, 150, "easeOutBounce").fadeOut(150, function(){
                $(this).remove();
            });

        });
    });
</script>
</body>
</html>