<?php
    session_start();
?>
<?php

include_once 'common.php';
//Read parameters from body to $_PUT.
parse_str(file_get_contents("php://input"), $_PUT);

$okToUpdate = true;

//Check for PUT function.  
if($_SERVER['REQUEST_METHOD'] != 'PUT') {
    $okToUpdate = false;
    //Die??
}

//Check birthdate.
$birthdate = "";
if($okToUpdate && isset($_PUT['date'])) {
    $birthdate = $_PUT['date'];
    //Check that it is possible to convert datestring to timestamp. 
    if(strtotime($birthdate) == false) {
        $okToUpdate = false;
    }
}

//Check that $_SESSION is set.
if(isset($_SESSION['horoscope'])) {
    //Update horoscope to session.
    if($okToUpdate) {
        $_SESSION['horoscope'] = getHoroscope($birthdate);
        echo "true";
    }
    else {
        echo "false";
    }
}


?>