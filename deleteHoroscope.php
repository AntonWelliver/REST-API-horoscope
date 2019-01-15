<?php
    session_start();
?>
<?php

//Check DELETE function
    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        session_start();
        if(isset($_SESSION['horoscope'])) {
            unset($_SESSION['horoscope']);
            echo "true";
        } else{
            echo "false";
        }
    }

?>