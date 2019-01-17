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
            //Create a request object for  HTTP request.
            var request = new XMLHttpRequest();
            request.open("POST", "addHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "date=" + birthday;

            request.onload = function() {
                //HTTP request recieved.
                if(this.status == 200){
                    if(this.responseText == "true") {
                        //Horoscope successfully added.
                        displayHoroscope();
                        saveButtonStyle();
                    }
                }
                else {
                    //Horoscope unsuccessfully added.
                    console.log("Error in request " + this.status);
                }
            }
            request.onerror = function() {
                console.log("Request failure");
            }
            request.send(parameters);
        }

        function updateHoroscope() {
            var birthday = birthdayField.value;
            var request = new XMLHttpRequest();
            request.open("PUT", "updateHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "date=" + birthday;

            request.onload = function() {
                if(this.status == 200){
                    if(this.responseText == "true") {
                        //Horoscope successfully added.
                        displayHoroscope();
                        updateButtonStyle();
                    }
                }
                else {
                    console.log("Error in request " + this.status);
                }
            }
            request.onerror = function() {
                console.log("Request failure");
            }
            request.send(parameters);
        }

        function deleteHoroscope() {
            var request = new XMLHttpRequest();
            request.open("DELETE", "deleteHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.onload = function() {
                if(this.status == 200){
                    displayHoroscope();
                    if(this.responseText == "true") {
                        //Horoscope successfully deleted.
                        displayHoroscope();
                        deleteButtonStyle();
                    }
                }
                else {
                    console.log("Error in request " + this.status);
                }
            }
            request.onerror = function() {
                console.log("Request failure");
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

        //Fetch version.
        function displayHoroscope() {
            fetch("viewHoroscope.php")
            .then((response) => response.text())
            .then((data) => {
                horoscopeField.innerHTML = data;
                if(data == "") {
                        deleteButtonStyle();
                    }
                    else {
                        updateButtonStyle();
                    }
            })
            .catch((err) => console.log(err))
        }
        //Ajax version.
        function displayHoroscope_ajax() {

            var request = new XMLHttpRequest();
            request.open("GET", "viewHoroscope.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.onload = function() {
                if(this.status == 200){
                    horoscopeField.innerHTML = this.responseText;
                    if(this.responseText == "") {
                        deleteButtonStyle();
                    }
                    else {
                        updateButtonStyle();
                    }
                }
                else {
                    console.log("Error in request " + this.status);
                } 
            }
            request.onerror = function() {
                console.log("Request failure");
            }
            request.send();
        }
        displayHoroscope();

    </script>
</body>
</html> 