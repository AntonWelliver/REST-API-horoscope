# Horoscope API
This is a REST API that I created where you can find out your own horoscope.

* To read the horoscope:

GET request to /REST-API-horoscope/viewHoroscope.php

* Sample Response:

"Aquarius"

* To save horoscope:

POST request to /REST-API-horoscope/addHoroscope.php

* Parameters:

"date" = birthdate (valid date format:"YYYY-MM-DD")

It's only possible to add a horoscope if there is no previous horoscope saved to the server.

* Sample Response:

Succesfull add, response "true". Unsuccesfull add, response "false".

