<?php include "includes/header.php"; ?>
<div class="notification-wrapper">
<?php

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

?>
</div>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="http://az616578.vo.msecnd.net/files/2016/04/10/635959145221156246-1374878879_partying.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Uitgaan Centrum De Bonte Koe<i class="material-icons right">more_vert</i></span>
                    <p><a href="#" class="activator">Lees meer</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Uitgaan Centrum De Bonte Koe<i class="material-icons right">close</i></span>
                    <p class="flow-text">
                        TOP! Een hele sfeervolle club met zeer goed eten en prettige bediening!
                        Gisteren de fantastische show 'Awaken your Senses' van Marlies Dekker hier meegemaakt.
                        In één woord: Geweldig! Als kleine bijkomstigheid bleek onderstaande zich te verslikken tijdens het eten,
                        enorme benauwdheid en dreiging tot stikken tot gevolg. Door zeer alert optreden van manlief, de eigenaar
                        van Club Thalia en een aanwezig verpleegkundige kon de ambulance gelukkig weer worden afgebeld. Na een heimlich
                        greep en rustig glaasje water buiten op terras met de innemelijke eigenaar kon ik deze mooie avond weer voortzetten
                        en genieten! Genieten van de show, de locatie, de maaltijd en zeker niet te vergeten de goede service en warme belangstelling!
                        Tijdens de avond nog 3 x bezoek gehad van de eigenaar en de zus van Marlies om te checken of het echt nog wel goed ging
                        . Geweldig mensen, dank jullie wel voor deze fijne avond. Ik heb genoten! Vooral zo doorgaan!!!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s6">
            <p class="flow-text">
                Toegangsprijs: € 7.50 <br>
                Openingstijden <br>
                Vrijdag: <?php echo $vrijdag->open; ?> t/m <?php echo $vrijdag->sluit; ?><br>
                Zaterdag: <?php echo $zaterdag->open; ?> t/m <?php echo $zaterdag->sluit; ?><br>
                Zondag: <?php echo $zondag->open; ?> t/m <?php  echo $zondag->sluit; ?><br>
            </p>
        </div>
    </div>



</div>





<?php include "includes/footer.php"; ?>