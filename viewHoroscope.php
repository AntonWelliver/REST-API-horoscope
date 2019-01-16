<?php
    session_start();
?>
<?php

//Check GET function.
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_SESSION['horoscope'])) {
            $horoscope = $_SESSION['horoscope'];
            echo $horoscope;
        } else{
            echo "no horoscope set";
        }
    }

?>