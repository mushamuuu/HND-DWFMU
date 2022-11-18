<?php
if (isset($_POST["submit"])) {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    require_once 'DBConnect.php';
    require_once 'functions.inc.php';
    if (emptyFieldLogin($Email, $Password) !== false) { //if fields are empty
        header("location: ../login.php?error=emptyfield");
        exit(); //terminates current script
    }
    //calls function from functions.inc.php
    loginUser($DB, $Email, $Password);
} else {
    header("location: ../login.php");
}
