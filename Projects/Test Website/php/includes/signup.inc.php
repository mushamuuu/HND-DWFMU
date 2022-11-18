<?php
if (isset($_POST["submit"])) {
    // Get the information from signup.php
    $Email         = $_POST['Email'];
    $Password        = $_POST['Password'];
    $Forename        = $_POST['Forename'];
    $Surname        = $_POST['Surname'];
    $ORDOB        = $_POST['DOB'];
    $CONDOB = strtotime($ORDOB); //Parse about any English textual datetime description into a Unix timestamp
    $DOB = date("Y-m-d", $CONDOB); //converts the date to y-m-d
    $Gender        = $_POST['Gender'];

    require_once("DBConnect.inc.php");              // Add in the database connection details
    require_once("functions.inc.php");
    //if all fields are empty
    if (emptyFieldSignup($Email, $Password, $Forename, $Surname, $DOB, $Gender) !== false) { //if fields are empty
        header("location: ../signup.php?error=emptyfield");
        exit(); //terminates current script
    }
    //if email exists in database
    if (emailExists($DB, $Email) !== false) { //checks if Email already exists in DB
        header("location: ../signup.php?error=EmailAlreadyExists");
        exit(); //terminates current script
    }
    createUser($DB, $Email, $Password, $Forename, $Surname, $DOB, $Gender);
} else {
    header("location: ../signup.php?error=error");
    exit();
}
