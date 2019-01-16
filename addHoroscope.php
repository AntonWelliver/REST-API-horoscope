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
/*         if(checkdate($birthdate) == false) {
            $okToAdd = false;
        } */
    }

    //Check that $_SESSION is empty
    if(isset($_SESSION['horoscope'])) {
        $okToAdd = false;
    }

    //Add horoscope to session
    if($okToAdd) {
        $_SESSION['horoscope'] = getHoroscope($birthdate);
        echo "true";
    }
    else {
        echo "false";
    }

    function getHoroscope($birthdate) {
        //Horoscope sign dates
        define('Capricorn', '-01-19');
        define('Aquarius', '-02-18');
        define('Pisces', '-03-20');
        define('Aries', '-04-19');

        $dateOfBirth = date_create($birthdate);
        $year = $dateOfBirth->format("Y");
        $birthdateSec = strtotime($birthdate);
        $secs = $birthdateSec-strtotime($year.Capricorn);

        if($birthdateSec-strtotime($year.Capricorn) < 0) {
            echo "Capricorn";
            return "Capricorn";
        }
        if($birthdateSec-strtotime($year.Aquarius) < 0) {
            return "Aquarius";
        }
        if($birthdateSec-strtotime($year.Pisces) < 0) {
            echo "Pisces";
            return "Pisces";
        }
        else {
            echo "Capricorn";
            return "Capricorn";
        }
    }
?>