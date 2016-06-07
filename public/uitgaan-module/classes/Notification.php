<?php

class Notification
{
    public static function show($type, $message){

        if($type == 'info')
        {
            return '<div class="notification white z-depth-1">
                        <p><i class="material-icons left info">info_outline</i>'. $message .'<i class="material-icons right close">close</i></p>
                    </div>';
        }
        elseif($type == 'warning')
        {
            return '<div class="notification warning white z-depth-1">
                       <p class="warning"><i class="material-icons left warning">error</i>'. $message .'<i class="material-icons right close">close</i></p>
                    </div>';
        }

        return false;

    }
}