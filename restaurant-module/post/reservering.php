<?php
    require_once "../config/db.php";

    if(isset($_POST['reservering'])){

        $name =  htmlentities($_POST['naam']);
        $email = htmlentities($_POST['email']);
        $num_of_people = htmlentities($_POST['aantalpersonen']);
        $date = htmlentities($_POST['date']);
        $time = htmlentities($_POST['time']);
        $comment = htmlentities($_POST['opmerking']);

        if(!empty($name) && !empty($email) && !empty($num_of_people) && !empty($date) && !empty($time)){

            if(!strlen($name) <= 4 || !strlen($name) > 64 || !strlen($email) <= 6 || !strlen($email) > 64){

                $sql = DB::getInstance()->query("INSERT INTO `reserveringen` (`naam`, `email`, `aantal_personen`, `datum`, `tijd`, `opmerking`) VALUES (?, ?, ?, ?, ?, ?);", array(
                    $name,
                    $email,
                    $num_of_people,
                    $date,
                    $time,
                    $comment
                ));

                $sql->execute();

                $_SESSION['home'] = '<div class="notification white z-depth-1">
                                        <p><i class="material-icons left info">info_outline</i> U heeft geregistreerd <i class="material-icons right close">close</i></p>
                                     </div>';
                header('Location: ../index.php');
            }else{
                $_SESSION['home'] = '<div class="notification warning white z-depth-1">
            <p class="warning"><i class="material-icons left warning">error</i> Er is iets missgegaan probeer opnieuw <i class="material-icons right close">close</i></p>
        </div>';
                header('Location: ../index.php');
            }

        }else{
            $_SESSION['home'] = '<div class="notification warning white z-depth-1">
            <p class="warning"><i class="material-icons left warning">error</i> Er is iets missgegaan probeer opnieuw <i class="material-icons right close">close</i></p>
        </div>';
            header('Location: ../index.php');
        }




    }else{
        header('Location: ../index.php');
    }