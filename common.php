<?php

    function getHoroscope($birthdate) {
        //Horoscope sign dates.
        define('Capricorn', '-01-19');
        define('Aquarius', '-02-18');
        define('Pisces', '-03-20');
        define('Aries', '-04-19');
        define('Taurus', '-05-20');
        define('Gemini', '-06-20');
        define('Cancer', '-07-22');
        define('Leo', '-08-22');
        define('Virgo', '-09-22');
        define('Libra', '-10-22');
        define('Scorpio', '-11-21');
        define('Sagittarius', '-12-21');

        //Create a date object for birthdate.
        $dateOfBirth = date_create($birthdate);
        //Get year from date object
        $year = $dateOfBirth->format("Y");
        //Get birthdate as timestamp in seconds.
        $birthdateSec = strtotime($birthdate);

        //In sequence calculate differens between birthdate and enddate of horoscope.
        //If differens is negative then the horoscope is selected.
        if($birthdateSec-strtotime($year.Capricorn) <= 0) {
            return "Capricorn";
        }
        if($birthdateSec-strtotime($year.Aquarius) <= 0) {
            return "Aquarius";
        }
        if($birthdateSec-strtotime($year.Pisces) <= 0) {
            return "Pisces";
        }
        if($birthdateSec-strtotime($year.Aries) <= 0) {
            return "Aries";
        }
        if($birthdateSec-strtotime($year.Taurus) <= 0) {
            return "Taurus";
        }
        if($birthdateSec-strtotime($year.Gemini) <= 0) {
            return "Gemini";
        }
        if($birthdateSec-strtotime($year.Cancer) <= 0) {
            return "Cancer";
        }
        if($birthdateSec-strtotime($year.Leo) <= 0) {
            return "Leo";
        }
        if($birthdateSec-strtotime($year.Virgo) <= 0) {
            return "Virgo";
        }
        if($birthdateSec-strtotime($year.Libra) <= 0) {
            return "Libra";
        }
        if($birthdateSec-strtotime($year.Scorpio) <= 0) {
            return "Scorpio";
        }
        if($birthdateSec-strtotime($year.Sagittarius) <= 0) {
            return "Sagittarius";
        }
        else {
            return "Capricorn";
        }
    }

?>