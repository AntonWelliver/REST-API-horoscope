<?php
    session_start();
?>
<?php

    /*header('Access-Control-Allow-Origin : *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');*/

    $okToAdd = true;

    //Check for POST function    
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        $okToAdd = false;
        //Die??
    }

    //Check birthdate
    $birthdate = "";
    if($okToAdd && isset($_POST['date'])) {
        $birthdate = $_POST['date'];
        if(checkdate(birthdate) == false) {
            $okToAdd = false;
        }
    }

    //Check that $_SESSION is empty
    if(isset($_SESSION['horoscope'])) {
        $okToAdd = false;
    }

    //Add horoscope to session
    if($okToAdd) {
        $_SESSION['horoscope'] = getHoroscope();
        $output = $_SESSION['horoscope'];
        echo $output;
    }
    else {
        echo "false";
    }

    function getHoroscope() {
        //Test
        return "Aquarius";
    }
?>