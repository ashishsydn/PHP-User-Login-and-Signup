<?php

if (isset($_POST["submit"])) {

    //Getting the data posted from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];



    //Instantiating the signup class
    require_once "../classes/Dbconfig.class.php";
    require_once "../classes/Signup.class.php";


    $signup = new Signup($name, $email, $password, $password2);

    //Error handling
    $signup->signupUser();

    //Redirecting to the dashboard
    header("Location: ../index.php?error=none");
}
