<?php
    session_start();
?>
<?php

    include_once 'common.php';
    $okToAdd = true;

    //Check for POST function.  
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        $okToAdd = false;
        //Die??
    }

    //Check birthdate.
    $birthdate = "";
    if($okToAdd && isset($_POST['date'])) {
        $birthdate = $_POST['date'];
        //Check that it is possible to convert datestring to timestamp. 
        if(strtotime($birthdate) == false) {
            $okToAdd = false;
        }
    }

    //Check that $_SESSION is empty.
    if(isset($_SESSION['horoscope'])) {
        $okToAdd = false;
    }

    //Add horoscope to session.
    if($okToAdd) {
        $_SESSION['horoscope'] = getHoroscope($birthdate);
        echo "true";
    }
    else {
        echo "false";
    }

?>