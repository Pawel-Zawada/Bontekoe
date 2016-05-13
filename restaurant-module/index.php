<?php   include "includes/header.php"; ?>

    <div class="notification-wrapper">
        <?php

        if(isset($_SESSION['home'])){
            echo "<p>" . $_SESSION['home'] . "</p>";
            unset($_SESSION['home']);
        }

        ?>
    </div>

    <div class="container">
        <form action="post/reservering.php" method="post">
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="naam" name="naam">
                            <label for="naam">Volledige naam</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="email" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="personen" name="aantalpersonen">
                            <label for="personen">Aantal Personen</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="date" class="datepicker" id="datum" name="date">
                            <label for="datum">Datum</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" placeholder="e.g. 19:30" id="tijd" name="time">
                            <label for="time">Tijd</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="opmerking"></textarea>
                            <label for="textarea1">Opmerking</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="waves-light waves-effect btn red" name="reservering" value="btn">Reserveer</button>

        </form>
    </div>

<?php include "includes/footer.php"; ?>
