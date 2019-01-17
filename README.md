# Horoscope API
This is a REST API that I created where you can find out your own horoscope.

Link to GitHub project: https://github.com/AntonWelliver/REST-API-horoscope 

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

To update horoscope:

PUT request to /REST-API-horoscope/updateHoroscope.php

* Parameters:

"date" = birthdate (valid date format:"YYYY-MM-DD")

It's only possible to update a horoscope if there is a horoscope saved to the server.

* Sample response:

Succesfull update, response "true". Unsuccesfull update, response "false".

* To delete the horoscope:

DELETE request to /REST-API-horoscope/deleteHoroscope.php

It's only possible to delete the horoscope if there is a horoscope saved to the server.

* Sample response:

Succesfull delete, response "true". Unsuccesfull delete, response "
