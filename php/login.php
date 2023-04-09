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


if (isset($_POST['login'])) {

    $email1 = $_POST['email1'];
    $password1 = ($_POST['password1']);
}

$data = array(
    "email1" => $email1,
    "password1" => $password1
);

//fetch user from MongoDB Users Collection
$fetch = $userCollection->findOne($data);

if ($fetch) {

    //create a session
    $_SESSION['email1'] = $fetch['email1'];

    //redirect to the profile page
    header('Location: ../assets/profile.html');
    exit();
} else {
    echo "<script>alert('Check Email and Password.'); window.location.href = '../login.html';</script>";

    ?>

    <!-- <center>
        <h4 style="color: red;">User Not Found</h4>
    </center>
    <center><a href="../login.html">Try Again</a></center> -->
    <?php
}