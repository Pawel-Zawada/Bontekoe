<?php include "includes/header.php"; ?>
<div class="notification-wrapper">
<?php

    if(Input::exists())
    {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'open' => array(
                'required' => true,
                'min' => 5,
                'max' => 6
            ),
            'sluit' => array(
                'required' => true,
                'min' => 5,
                'max' => 6
            )
        ));
        if($validate->passed()){

            try{
                $db = DB::getInstance();

                $db->update('openingtijden', Input::get('id'), array(
                    'open' => Input::get('open'),
                    'sluit' => Input::get('sluit')
                ));

                Session::flash('edit', Notification::show('info', 'Tijden zijn geupdate'));
                Redirect::to('openingstijden.php');

            }catch(PDOException $e){
                Session::flash('edit', Notification::show('warning', 'U heeft niks ingevuld'));
                Redirect::to('openingstijden.php');
            }

        }else{
            foreach($validate->errors() as $error){
                echo Notification::show('warning', $error);
            }
        }

    }

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

    if(Session::exists('edit')){
        echo Session::flash('edit');
    }

?>
</div>
<div class="container">
    <div class="row">
        <div class="card-panel col s12 m12 l6 indigo">
            <h1 class="header white-text">Verander Openingstijden</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input class="white-text" type="text" name="open" id="open">
                        <label for="open" class="active white-text">Openingstijd</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input class="white-text" type="text" name="sluit" id="open">
                        <label for="open" class="active white-text">Sluittijd</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <select id="dag" name="id">
                            <option value="" disabled selected>Kies een dag</option>
                            <option value="1">Vrijdag</option>
                            <option value="2">Zaterdag</option>
                            <option value="3">Zondag</option>
                        </select>
                        <label for="dag">Materialize Select</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn-flat waves-effect waves-light orange-text">Verander</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col s12 m12 l2">
            <p class="flow-text">
                Vrijdag: <br>
                Open om: <?php echo $vrijdag->open; ?> <br>
                Sluit om: <?php echo $vrijdag->sluit; ?> <br>
            </p>
        </div>
        <div class="col s12 m12 l2">
            <p class="flow-text">
                Zaterdag: <br>
                Open om: <?php echo $zaterdag->open; ?> <br>
                Sluit om: <?php echo $zaterdag->sluit; ?> <br>
            </p>
        </div>
        <div class="col s12 m12 l2">
            <p class="flow-text">
                Zondag: <br>
                Open om: <?php echo $zondag->open; ?> <br>
                Sluit om: <?php echo $zondag->sluit; ?> <br>
            </p>
        </div>


    </div>
</div>




<?php include "includes/footer.php"; ?>
