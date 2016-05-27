<?php
/**
 * Created by PhpStorm.
 * User: Gino0
 * Date: 5/17/2016
 * Time: 2:17 PM
 */

include ("includes/header.php");
require_once "core/init.php";
?><div class="notification-wrapper"><?php



//Form code starts here

if(Input::exists())
{
    if(isset($_POST['form'])){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'naam' => array(
                'required' => true,
                'min' => 3,
                'max' =>50,
            ),

            'prijs' => array(
              'required' => true,
            ),


            'description' =>array(
                'required' => true,
                'min' => 10,
                'max' => 150
            )
        ));


        $categorySelect = isset($_POST['category']) ? $_POST['category'] : null;

        switch ($categorySelect){
            case 1:
                $table = "alcohol";
                break;
            case 2:
                $table = "frisdranken";
                break;
            case 3:
                $table = "voorgerecht";
                break;
            case 4:
                $table = "hoofdgerecht";
                break;
            case 5:
                $table = "nagerecht";
                break;
            default:
                $table = ' ';
                break;
        }

        if($validate->passed()) {
            DB::getInstance()->query("INSERT INTO `$table`(`naam`, `beschrijving`, `prijs`) VALUES (?, ?, ?)" ,array(
                Input::get('naam'),
                Input::get('description'),
                Input::get('prijs')
            ));
            header('Location: menu-admin.php');

        }
        else{
            foreach($validate->errors() as $error){
                echo '<div class="notification warning white z-depth-1">
                            <p class="warning"><i class="material-icons warning">error</i>' . $error . '<i class="material-icons right close">close</i></p>
                          </div>';
            }
        }
    }
}

//form code ends here

//show menu starts here

$queryAlcohol = "SELECT `id`, `naam`,`prijs`, `beschrijving` FROM `alcohol` ";
$queryFrisdranken = "SELECT `id`, `naam`,`prijs`, `beschrijving` FROM `frisdranken`";
$queryVgerechten = "SELECT `id`, `naam`,`prijs`, `beschrijving` FROM `voorgerecht`";
$queryHgerechten = "SELECT `id`, `naam`,`prijs`, `beschrijving` FROM `hoofdgerecht`";
$queryNgerechten = "SELECT `id`, `naam`,`prijs`, `beschrijving` FROM `nagerecht`";

//delete function




if(Input::exists()) {
    $id = Input::get('hiddenid');
    $value = Input::get('hiddenvalue');
    $gettable = 'null';

    switch($value){
        case 1:
            $gettable = 'alcohol';
            break;
        case 2:
            $gettable = 'frisdranken';
            break;
        case 3:
            $gettable = 'voorgerecht';
            break;
        case 4:
            $gettable = 'hoofdgerecht';
            break;
        case 5:
            $gettable = 'nagerecht';
            break;

    }

    $delete = DB::getInstance()->query("DELETE FROM `$gettable` WHERE `id` = $id");
}
?>
    </div>

<div class="container">
        <div class="card-panel">
            <div class="row">
                <form method="post" class="col s12 m12 l12">
                    <div class="row">
                        <h4>Gerechten/dranken toevoegen</h4>
                    </div>
                    <div class="divider"></div>

                    <div class="row">
                        <select name="category" id="category">
                            <option value="" disabled selected>Kies een categorie</option>
                            <option value="1">Alcoholische dranken</option>
                            <option value="2">Dranken</option>
                            <option value="3">Voorgerecht</option>
                            <option value="4">Hoofdgerecht</option>
                            <option value="5">Nagerecht</option>
                        </select>
                        <label for="category"></label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="naam" name="naam" type="text" class="validate" autocomplete="off">
                            <label for="naam">Naam product</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="prijs" name="prijs" type="text" class="validate" autocomplete="off">
                            <label for="prijs">Prijs</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea class="materialize-textarea" name="description" id="description"></textarea>
                            <label for="description">Korte beschrijving</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field center">
                            <button type="submit" name="form" value="verzenden" class="waves-effect waves-light btn" style="background-color: #FF6A00">Verzenden</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="container">
    <div class="card-panel">
        <div class="row">
            <h4>Menu</h4>
        </div>
        <div class="row">
            <h5 style="color:#FF6A00">Alcoholische dranken :</h5>
            <div class="divider"></div>
            <?php
            $sqlAlcohol = DB::getInstance()->query($queryAlcohol);
            foreach($sqlAlcohol->results() as $result){
                $id=$result->id;
                $value = 1;
                echo "<br><h5>$result->naam</h5>
                        <blockquote>$result->beschrijving €{$result->prijs}</blockquote><br>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn' style='background-color: #FF6A00' value='Delete'>
                      </form></div>";
            }

            ?>
        </div>

        <div class="row">
            <h5 style="color: #FF6A00">Dranken :</h5>
            <div class="divider"></div>
            <?php
            $sqldranken = DB::getInstance()->query($queryFrisdranken);
            foreach ($sqldranken->results() as $dResult){
                $id=$dResult->id;
                $value = 2;
                echo "<br><h5>$dResult->naam</h5>
                        <blockquote>$dResult->beschrijving €{$dResult->prijs}</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn' STYLE='background-color: #FF6A00' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#FF6A00">Voorgerecht :</h5>
            <div class="divider"></div>
            <?php
            $sqlvoor = DB::getInstance()->query($queryVgerechten);
            foreach ($sqlvoor->results() as $voorresult){
                $id=$voorresult->id;
                $value = 3;
                echo "<br><h5>$voorresult->naam</h5>
                        <blockquote>$voorresult->beschrijving €{$voorresult->prijs}</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn' style='background-color: #FF6A00' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#FF6A00">Hoofdgerechten :</h5>
            <div class="divider"></div>
            <?php
            $sqlhoofd = DB::getInstance()->query($queryHgerechten);
            foreach ($sqlhoofd->results() as $hoofdresult){
                $id=$hoofdresult->id;
                $value = 4;
                echo "<br><h5>$hoofdresult->naam</h5>
                        <blockquote>$hoofdresult->beschrijving €{$hoofdresult->prijs}</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn' style='background-color: #FF6A00' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#FF6A00">Nagerechten :</h5>
            <div class="divider"></div>
            <?php
            $sqlna = DB::getInstance()->query($queryNgerechten);
            foreach ($sqlna->results() as $naresult){
                $id=$naresult->id;
                $value = 5;
                echo "<br><h5>$naresult->naam</h5>
                        <blockquote>$naresult->beschrijving €{$naresult->prijs}</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn' style='background-color: #FF6A00' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

</div>
<script>

</script>





<?php include ("includes/footer.php")?>


