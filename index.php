<?php
    // Start session
    if(session_status()!=PHP_SESSION_NONE){
    session_destroy();
    }
    
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    $conn->select_db('myDB');
    $sql = "CREATE TABLE myTable("
            . "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
            . "fname VARCHAR(30) NOT NULL,"
            . "lname VARCHAR(30) NOT NULL,"
            . "password VARCHAR(30) NOT NULL,"
            . "dob VARCHAR(30),"
            . "city VARCHAR(30),"
            . "country VARCHAR(30),"
            . "pincode VARCHAR(30),"
            . "email VARCHAR(30) NOT NULL,"
            . "mobile VARCHAR(30))";
    $conn->query($sql);
    // this code creates the table that stores the user options when they are selecting
    $sql = "CREATE TABLE allotment("
            . "day DATE NOT NULL,"
            . "royal INT NOT NULL,"
            . "deluxe INT NOT NULL,"
            . "doubleb INT NOT NULL,"
            . "single INT NOT NULL)";
    $conn->query($sql);
    //this code creates a table that stores the user defined bookings
    $sql = "CREATE TABLE bookings("
            . "idx INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
            . "id INT NOT NULL,"
            . "date_from DATE NOT NULL,"
            . "date_to DATE NOT NULL,"
            . "room_type VARCHAR(10) NOT NULL,"
            . "rooms INT NOT NULL,"
            . "amount INT,"
            . "payment_done INT,"
            . "payment_due INT)";
    $conn->query($sql);
}
else{
    $conn->select_db('myDB');
}

$conn->close();
?>



<!DOCTYPE html>

<html>
    <head>
        <title>Welcome</title>
        <style>
        .right{
            position: absolute;
            right: 500px;
        }
        .left{
            position: absolute;
            left: 500px;
        }
        .button1{
            background-color:white;
            opacity: 0.8;
            color: black;
            padding: 5px;
            font-size: 15px;
        }
        .button1:hover{
            background-color: tan;
            color: black;
        }
        .button2{
            background-color:white;
            opacity: 0.8;
            color: black;
            padding: 5px;
            font-size: 15px;
        }
        .button2:hover{
            background-color: tan;
            color: black;
        }
        .container1{
            margin-left: auto;
            margin-right: auto;
        }
        body{
            background-image: url("bg23.jpg");
            background-repeat: no-repeat;
        }
        </style>
    </head>
    <body>
        <br><br><br><br>
        <div class="container1">
        <h1 style="color:black;text-align: center;">Welcome!</h1>
        <h1 style="font-size:300%;color:black;text-align: center;">To the Picolo Mondo</h1>
        <h1 style="font-size:300%;color:black;text-align: center;">The 5 Star of of 5 Stars Hotel</h1>
        <br><br>
            <form method="post" action="new_user.php">
            <div class="left">
                <button class="button button1">Sign Up</button>
            </div>
            </form>
            <form method="post" action="login.php">
            <div class="right">
                <button class="button button2">Log In</button>
            </div>
            </form>
        </div>
        
    </body>
</html>
