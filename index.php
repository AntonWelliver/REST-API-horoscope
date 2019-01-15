<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horoscope</title>
</head>
<body>
    <div id="horoscope">
        
    </div>

    <form action="/viewHoroscope.php" method="POST">
        Birthdate: <input type="date" id="birthDate" name="birthdate"><br>
    </form>

    <button onclick="saveHoroscope()">Save horoscope</button>
    <button onclick="updateHoroscope()">Update horoscope</button>
    <button onclick="deleteHoroscope()">Delete horoscope</button>

    <script>

        var birthdayField = document.getElementById("birthDate");
        var horoscopeField = document.getElementById("horoscope");
        
        function saveHoroscope() {
            var birthday = birthdayField.value;
            console.log("Save pressed date " + birthday);
            var request = new XMLHttpRequest();
            request.open("POST", "addHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "date=" + birthday;
            console.log("parameters " + parameters);

            request.onload = function() {
                if(this.status == 200){
                    console.log(this.responseText);
                    if(this.responseText == "true") {
                        //Horoscope successfully added
                        console.log("Update again");
                        displayHoroscope();
                    }
                    displayHoroscope();
                }
            }
            request.send(parameters);
        }

        function deleteHoroscope() {
            console.log("Call deleteHoroscope");
            var request = new XMLHttpRequest();
            request.open("DELETE", "deleteHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.onload = function() {
                if(this.status == 200){
                    console.log("200 ok");
                    console.log(this.responseText);
                    displayHoroscope();
                    if(this.responseText == "true") {
                        //Horoscope successfully deleted
                        displayHoroscope();
                    }
                }
            }
            request.send();
        }

        function displayHoroscope() {

            console.log("Call viewHoroscope");
            var request = new XMLHttpRequest();
            request.open("GET", "viewHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.onload = function() {
                if(this.status == 200){
                    console.log("200 ok");
                    console.log(this.responseText);
                }
                horoscopeField.innerHTML = this.responseText;
            }
            request.send();
        }
        displayHoroscope();

    </script>
</body>
</html> 