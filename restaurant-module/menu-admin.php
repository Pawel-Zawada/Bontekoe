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
                $table = "voorgerechten";
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
            DB::getInstance()->query("INSERT INTO `$table`(`naam`, `beschrijving`) VALUES (?, ?)" ,array(
                Input::get('naam'),
                Input::get('description')
            ));

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

$queryAlcohol = "SELECT `id`, `naam`, `beschrijving` FROM `alcohol` ";
$queryFrisdranken = "SELECT `id`, `naam`, `beschrijving` FROM `frisdranken`";
$queryVgerechten = "SELECT `id`, `naam`, `beschrijving` FROM `voorgerecht`";
$queryHgerechten = "SELECT `id`,`naam`, `beschrijving` FROM `hoofdgerecht`";
$queryNgerechten = "SELECT `id`, `naam`, `beschrijving` FROM `nagerecht`";

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
                            <input id="naam" name="naam" type="text" class="validate">
                            <label for="naam">Naam product</label>
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
                            <button type="submit" name="form" value="verzenden" class="waves-effect waves-light btn red">Verzenden</button>
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
            <h5 style="color:#F44336">Alcoholische dranken :</h5>
            <div class="divider"></div>
            <?php
            $sqlAlcohol = DB::getInstance()->query($queryAlcohol);
            foreach($sqlAlcohol->results() as $result){
                $id=$result->id;
                $value = 1;
                echo "<br><h5>$result->naam</h5><br>
                        <blockquote>$result->beschrijving</blockquote><br>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn red' value='Delete'>
                      </form></div>";
            }

            ?>
        </div>

        <div class="row">
            <h5 style="color: #f44336">Dranken :</h5>
            <div class="divider"></div>
            <?php
            $sqldranken = DB::getInstance()->query($queryFrisdranken);
            foreach ($sqldranken->results() as $dResult){
                $id=$dResult->id;
                $value = 2;
                echo "<br><h5>$dResult->naam</h5><br>
                        <blockquote>$dResult->beschrijving</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn red' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#F44336">Voorgerecht :</h5>
            <div class="divider"></div>
            <?php
            $sqlvoor = DB::getInstance()->query($queryVgerechten);
            foreach ($sqlvoor->results() as $voorresult){
                $id=$voorresult->id;
                $value = 3;
                echo "<br><h5>$voorresult->naam</h5><br>
                        <blockquote>$voorresult->beschrijving</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn red' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#F44336">Hoofdgerechten :</h5>
            <div class="divider"></div>
            <?php
            $sqlhoofd = DB::getInstance()->query($queryHgerechten);
            foreach ($sqlhoofd->results() as $hoofdresult){
                $id=$hoofdresult->id;
                $value = 4;
                echo "<br><h5>$hoofdresult->naam</h5><br>
                        <blockquote>$hoofdresult->beschrijving</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn red' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

        <div class="row">
            <h5 style="color:#F44336">Nagerechten :</h5>
            <div class="divider"></div>
            <?php
            $sqlna = DB::getInstance()->query($queryNgerechten);
            foreach ($sqlna->results() as $naresult){
                $id=$naresult->id;
                $value = 5;
                echo "<br><h5>$naresult->naam</h5><br>
                        <blockquote>$naresult->beschrijving</blockquote>";
                echo "<div class='right'><form method='post' name='delete'>
                            <input name='hiddenid' type='hidden' value='$id'>
                            <input name='hiddenvalue' type='hidden' value='$value'>
                            <input type='submit' name='delete' class='waves-effect waves-light btn red' value='Delete'>
                        </form></div>";
            }
            ?>
        </div>

</div>
<script>

</script>





<?php include ("includes/footer.php")?>


