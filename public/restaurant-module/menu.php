<?php require_once ("includes/header.php");

$queryAlcohol = "SELECT `naam`,`prijs`, `beschrijving` FROM `alcohol` ";
$queryFrisdranken = "SELECT `naam`,`prijs`, `beschrijving` FROM `frisdranken`";
$queryVgerechten = "SELECT `naam`,`prijs`, `beschrijving` FROM `voorgerecht`";
$queryHgerechten = "SELECT `naam`,`prijs`, `beschrijving` FROM `hoofdgerecht`";
$queryNgerechten = "SELECT `naam`,`prijs`, `beschrijving` FROM `nagerecht`";

?>

<div class="container">
    <div class="card-panel" style="background-color: #FF6A00;">
        <div class="row">
            <h4 style="color: white;background-color: #FF6A00" class="center">Menu</h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="card-panel">
        <div class="row">
            <h5 style="color:#FF6A00">Voorgerechten :</h5>
        </div>
        <div class="row">
            <?php
            $sqlvoor = DB::getInstance()->query($queryVgerechten);

            foreach ($sqlvoor->results() as $voor){
                echo "<h5>$voor->naam</h5> <h5 class='right'>€{$voor->prijs}</h5>";
                echo "<p><blockquote>$voor->beschrijving</blockquote></p>";
                echo "<div class='divider'></div>";
            }
            ?>
        </div>
    </div>

    <div class="card-panel">
        <div class="row">
            <h5 style="color:#FF6A00">Hoofdgerechten :</h5>
        </div>
        <div class="row">
            <?php
            $sqlhoofd = DB::getInstance()->query($queryHgerechten);

            foreach ($sqlhoofd->results() as $hoofd){
                echo "<h5>$hoofd->naam</h5> <h5 class='right'>€{$hoofd->prijs}</h5>";
                echo "<p><blockquote>$hoofd->beschrijving</blockquote></p>";
                echo "<div class='divider'></div>";
            }
            ?>
        </div>
    </div>

    <div class="card-panel">
        <div class="row">
            <h5 style="color:#FF6A00">Hoofdgerechten :</h5>
        </div>
        <div class="row">
            <?php
            $sqlna = DB::getInstance()->query($queryNgerechten);

            foreach ($sqlna->results() as $na){
                echo "<h5>$na->naam</h5> <h5 class='right'>€{$na->prijs}</h5>";
                echo "<p><blockquote>$na->beschrijving</blockquote></p>";
                echo "<div class='divider'></div>";
            }
            ?>
        </div>
    </div>

    <div class="card-panel">
        <div class="row">
            <h5 style="color:#FF6A00">Dranken (niet-alcoholisch) :</h5>
        </div>
        <div class="row">
            <?php
            $sqlf = DB::getInstance()->query($queryFrisdranken);

            foreach ($sqlf->results() as $fdrank){
                echo "<h5>$fdrank->naam</h5> <h5 class='right'>€{$fdrank->prijs}</h5>";
                echo "<p><blockquote>$fdrank->beschrijving</blockquote></p>";
                echo "<div class='divider'></div>";
            }
            ?>
        </div>
    </div>

    <div class="card-panel">
        <div class="row">
            <h5 style="color:#FF6A00">Dranken (alcoholisch) :</h5>
        </div>
        <div class="row">
            <?php
            $sqld = DB::getInstance()->query($queryAlcohol);

            foreach ($sqld->results() as $drank){
                echo "<h5>$drank->naam</h5> <h5 class='right'>€{$drank->prijs}</h5>";
                echo "<p><blockquote>$drank->beschrijving</blockquote></p>";
                echo "<div class='divider'></div>";
            }
            ?>
        </div>
    </div>
</div>



<?php require_once ("includes/footer.php")?>
