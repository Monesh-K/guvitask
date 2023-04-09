<?php

session_start();

unset($_SESSION['email1']);

session_destroy();

header('Location: ../index.html');
?>