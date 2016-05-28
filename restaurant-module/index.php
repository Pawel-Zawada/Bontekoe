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


    <div class="row">
        <form action="" method="post">
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="naam" name="naam">
                            <label for="naam">Volledige naam</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="email" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" id="personen" name="aantalpersonen">
                            <label for="personen">Aantal Personen</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="date" class="datepicker" id="datum" name="date">
                            <label for="datum">Datum</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input type="text" class="validate" placeholder="e.g. 19:30" id="tijd" name="time">
                            <label for="time">Tijd</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l5">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="opmerking"></textarea>
                            <label for="textarea1">Opmerking</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="waves-light waves-effect btn" name="reservering" value="btn" style="background-color: #FF6A00">Reserveer</button>

        </form>


        <div class="col s12 m6 l7 hide-on-small-and-down">
            <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39148.581918353426!2d4.610317374835417!3d52.174577465941844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5db4337cb2ef1%3A0x36d2588784945cbc!2sWoubrugge!5e0!3m2!1snl!2snl!4v1464360616933" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="contact">
                <h5>Contact</h5>
                <p>Restaurant De Bontekoe</p>
                <p><strong>Openingstijden :</strong> </p>
                <p><strong>Telefoon Nummer:</strong> +31 0172 123457</p>
                <p><strong>Beschrijving:</strong><br>
                    Gelegen in het boerenorpje Woudebrugge kunt u hier dagelijks terecht voor echte authentieke mediterraanse maaltijden,
                    voor een snelle hap, maar ook voor een uitgebreid avondje tafelen, dan begint u met antipasto, gevolgd door primo,
                    secondo en tot slot een dolce met caffe en limoncello. Wij werken alleen met de beste en verse producten.
                </p>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
