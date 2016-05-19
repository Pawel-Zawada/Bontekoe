<?php   include "includes/header.php";
?><div class="notification-wrapper"><?php

        if(Input::exists())
        {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(

                'naam' => array(
                    'required' => true,
                    'min' => 6,
                    'max' => 64
                ),
                'email' => array(
                    'required' => true,
                    'min' => 6,
                    'max' => 64
                ),
                'aantalpersonen' => array(
                    'required' => true,
                ),
                'date' => array(
                    'required' => true
                ),
                'time' => array(
                    'required' => true
                )
            ));
            if($validate->passed()){

                $reserveringen = new Reservering();

                try{

                    $reserveringen->create(array(
                        Input::get('naam'),
                        Input::get('email'),
                        Input::get('aantalpersonen'),
                        Input::get('date'),
                        Input::get('time'),
                        Input::get('opmerking')
                    ));

                    Session::flash('home', '<div class="notification white z-depth-1">
                                                <p><i class="material-icons left info">info_outline</i> U heeft geregistreerd <i class="material-icons right close">close</i></p>
                                            </div>');
                    Redirect::to('index.php');



                }catch(Exception $e){
                    Session::flash('home', '<div class="notification warning white z-depth-1">
                                    <p class="warning"><i class="material-icons left warning">error</i> U heeft niks ingevuld <i class="material-icons right close">close</i></p>
                                 </div>');
                    header('Location: index.php');
                }

            }
            else{

                foreach($validate->errors() as $error){
                    echo '<div class="notification warning white z-depth-1">
                            <p class="warning"><i class="material-icons left warning">error</i>' . $error . '<i class="material-icons right close">close</i></p>
                          </div>';
                }
            }
        }



?>

        <?php

        if(Session::exists('home')){
            echo Session::flash('home');
        }

        ?>
    </div>

    <div class="container">
        <form action="" method="post">
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
