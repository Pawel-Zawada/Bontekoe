<?php include "includes/header.php"; ?>
    <div class="notification-wrapper">
        <?php
        /**
        $dagen_db = DB::getInstance();

        $vrijdag = $dagen_db->get('openingtijden', array(
        'id',
        '=',
        1,
        ))->first();
        $zaterdag = $dagen_db->get('openingtijden', array(
        'id',
        '=',
        2,
        ))->first();
        $zondag = $dagen_db->get('openingtijden', array(
        'id',
        '=',
        3,
        ))->first();
         **/
        ?>
    </div>
<div class="container">
    <div class="row">
        <div class="col s12 m4">

            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="http://www.landvancuijk.nl/images/agenda/6598.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>

        </div>
        <div class="col s12 m4">

            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="http://bunderfeest.kpjoudgastel.nl/wp-content/uploads/2010/02/schuur.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>

        </div>
        <div class="col s12 m4">

            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="https://i.ytimg.com/vi/ZNmgVtRIcDs/hqdefault.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>

        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>