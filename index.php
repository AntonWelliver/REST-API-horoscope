<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Horoscope</title>
</head>
<body>
    <div id="contentContainer">
        <div id="horoscope">
        
        </div>
    
        <form action="/viewHoroscope.php" method="POST" id="dateForm">
            Birthdate: <input type="date" id="birthDate" name="birthdate"><br>
        </form>
    
        <button onclick="saveHoroscope()" id="saveButton">Save horoscope</button>
        <button onclick="updateHoroscope()" id="updateButton">Update horoscope</button>
        <button onclick="deleteHoroscope()" id="deleteButton">Delete horoscope</button>
    </div>


    <script>

        var birthdayField = document.getElementById("birthDate");
        var horoscopeField = document.getElementById("horoscope");
        
        var saveButton = document.getElementById("saveButton");
        var updateButton = document.getElementById("updateButton");
        var deleteButton = document.getElementById("deleteButton");

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
                    console.log("response: " + this.responseText);
                    if(this.responseText == "true") {
                        //Horoscope successfully added.
                        console.log("Update again");
                        displayHoroscope();
                        saveButtonStyle();
                    }
                }
            }
            request.send(parameters);
        }

        function updateHoroscope() {
            var birthday = birthdayField.value;
            console.log("Update pressed date " + birthday);
            var request = new XMLHttpRequest();
            request.open("PUT", "updateHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "date=" + birthday;
            console.log("parameters " + parameters);

            request.onload = function() {
                if(this.status == 200){
                    console.log("update response: " + this.responseText);
                    if(this.responseText == "true") {
                        //Horoscope successfully added.
                        console.log("Update again");
                        displayHoroscope();
                        updateButtonStyle();
                    }
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
                        //Horoscope successfully deleted.
                        displayHoroscope();
                        deleteButtonStyle();
                    }
                }
            }
            request.send();
        }

        function saveButtonStyle() {
            saveButton.className = "no-display";
            updateButton.className = "re-display";
            deleteButton.className = "re-display";
        }
        
        function updateButtonStyle() {
            saveButton.className = "no-display";
            updateButton.className = "re-display";
            deleteButton.className = "re-display";
        }

        function deleteButtonStyle() {
            saveButton.className = "re-display";
            updateButton.className = "no-display";
            deleteButton.className = "no-display";
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