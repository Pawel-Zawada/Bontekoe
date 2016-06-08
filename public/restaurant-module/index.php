
<?php
/**
 * Created by PhpStorm.
 * User: Matthijs
 * Date: 26-5-2016
 * Time: 12:19
 */
?>
<!doctype html>
<html lang="nl">
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="home">
<?php include_once 'includes/header.php'; ?>
<div class="row">
    <div class="container">
        <div class="col s4">
            <div class="card-panel">
                <div class="center promo promo-example">
                    <i class="large material-icons">flash_on</i>
                    <p class="promo-caption">Uitstekende Service</p>
                    <p class="light center">Wij bieden u de uitstekende service die u verdient als bezoeker aan het Bontekoe restaurant.</p>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">
                <div class="center promo promo-example">
                    <i class="large material-icons">done</i>
                    <p class="promo-caption">Uitgebreide keuze</p>
                    <p class="light center">Ons menu staat bekend om zijn rijke keuze aan verschillende delicatessen en heerlijke maaltijden.</p>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card-panel">
                <div class="center promo promo-example">
                    <i class="large material-icons">grade</i>
                    <p class="promo-caption">Hoge Recensies</p>
                    <p class="light center">Onze klanten laten altijd positieve feedback achter na het bezoek aan ons restaurant.</p>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $(".button-collapse").sideNav();
    });
</script>
</html>
