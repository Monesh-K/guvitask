<?php

session_start();

//this pulls the MongoDB driver from vendor folder
require_once '../vendor/autoload.php';

//connect to MongoDB Database
$databaseConnection = new MongoDB\Client;

//connecting to specific database in mongoDB
$myDatabase = $databaseConnection->myDB;

//connecting to our mongoDB Collections
$userCollection = $myDatabase->users;

if (isset($_POST['update'])) {
    $firstname1 = $_POST['firstname1'];
    $lastname1 = $_POST['lastname1'];
    $email1 = $_POST['email1'];
    $password1 = $_POST['password1'];
    $phone_number1 = $_POST['phone_number1'];
    $birth_date1 = $_POST['birth_date1'];
    $gender1 = $_POST['gender1'];
    $country1 = $_POST['country1'];
    $hidden_id = $_POST['hidden_id'];
}

$data = array(
    '$set' => array(
        "firstname1" => $firstname1,
        "lastname1" => $lastname1,
        "email1" => $email1,
        "password1" => $password1,
        "phone_number1" => $phone_number1,
        "birth_date1" => $birth_date1,
        "gender1" => $gender1,
        "country1" => $country1,
    )
);

//insert into MongoDB Users Collection
$update = $userCollection->updateOne(['_id' => new \Mongo\BSON\ObjectID($hidden_id)], $data);

if ($update) {
    header('Location: ../php/profile.php');
} else {
    ?>
    // <center>
        // <h4 style="color: red;">Update Failed</h4>
        // </center>
    // <center><a href="editprofile.php">Try Again</a></center>
    //
    <?php
}

?>