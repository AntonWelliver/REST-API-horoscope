<?php

//Check DELETE function
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        session_start();
        if(isset($_SESSION['horoscope'])) {
            unset($_SESSION['horoscope']);
            echo "true";
        } else{
            echo "false";
        }
    }

?>