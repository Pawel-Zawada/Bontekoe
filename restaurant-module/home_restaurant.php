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
        <div class="row">
            <div class="fullscreen">
            <div class="absolute">
                <div class="balk">
                    <ul class="tabs z-depth-2">
                        <li class="tab col s3"><a href="#test1">Menu</a></li>
                        <li class="tab col s3"><a href="#test2">Over Ons</a></li>
                        <li class="tab col s3"><a href="#test3" class="active">Welkom</a></li>
                        <li class="tab col s3"><a href="#test4">Onze Boeren</a></li>
                    </ul>
                </div>
                <div id="test3"></div>
                <div id="test1" class="description z-depth-1">
                    <br>
                    <h5>Bekijk ons rijk samengestelde menu</h5>
                    <br>
                    <div class="row">
                        <div class="col s10"> <p>Vers, Kruidig en rijk aan smaak zijn allemaal eigenschappen die passen bij de mediterraanse keuken.<br>
                                Bij ons vindt u Italiaans, Grieks, Frans, Spaans en Portugees eten.<br>
                                Ons eten word bereid door het beste keuken personeel en natuurlijk onze chef Fernando.<br>
                            </p>
                        </div>
                        <div class="col s2" style="padding: 0">
                            <img src="images/mr._chef_kok_kostuum_a.jpg" class="chef">
                        </div>
                    </div>
                    <a class="waves-effect waves-light btn" style="background-color: #FF6A00; margin: 3%" href="menu.php">Bekijk ons menu</a>
                </div>
                <div id="test2" class="description z-depth-1">
                    <br>
                    <h5>Over ons</h5>
                    <br>
                    <div class="row">
                        <div class="col s10">
                            <p>
                                Gelegen in het boerenorpje Woudebrugge kunt u hier dagelijks terecht voor echte authentieke mediterraanse maaltijden,<br>
                                voor een snelle hap, maar ook voor een uitgebreid avondje tafelen, dan begint u met antipasto, gevolgd door primo,<br>
                                secondo en tot slot een dolce met caffe en limoncello. Wij werken alleen met de beste en verse producten.<br>
                            </p>
                        </div>
                        <div class="col s2">
                            <img src="images/Antipasto-Skewers-5.jpg" class="antipasto">
                        </div>
                    </div>
                </div>
                <div id="test4" class="description z-depth-1">
                    <br>
                    <h5>Onze boeren</h5>
                    <br>
                    <div class="row">
                        <div class="col s10">
                            <p>
                                Natuurlijk kunnen wij niks zonder onze boeren.<br>
                                Al ons groente en fruit wordt elke dag vers en biologisch geleverd,<br>
                                Wij hechten namelijk veel waarden aan vers eten.<br>

                            </p>
                        </div>
                        <div class="col s2">
                            <img src="images/bio-tomaat.jpg" class="tomaat">
                        </div>
                    </div>
                </div>
            </div>
                <div class="button-welkom">

                    <div class="center-align">
                        <h5 class="titel">Welkom bij restaurant De Bontekoe</h5>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="center-align knop">
                        <a class="waves-effect waves-light btn" style="background-color: #FF6A00" href="index.php">Gelijk Reserveren</a>
                    </div>
                    <br>
                    <br>
                    <div class="center-align">
                        <img class="logo responsive-img" src="images/Bontekoe-Logo-PNG.png">
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
            $('ul.tabs').click(function(){
                tabs();
                
            });
        });
    </script>
</html>
