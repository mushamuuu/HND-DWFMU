<?php
//if signup field is empty
function emptyFieldSignup($Email, $Password, $Forename, $Surname, $DOB, $Gender)
{
    //returns true or false statement
    if (empty($Email) || empty($Password) || empty($Forename)|| empty($Surname)  || empty($DOB) || empty($Gender)) { //if one or more fields are empty
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//if email exists
function emailExists($DB, $Email)
{
    $query = "SELECT * FROM Test_User WHERE email = ?;";
    $stmt = mysqli_stmt_init($DB); //init=initialising the stmt
    if (!mysqli_stmt_prepare($stmt, $query)) { //checks if theres any error in sql statement
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $Email); //binding the input to statement as a string (s)
    mysqli_stmt_execute($stmt); //executing the statement
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//if login fields are empty
function emptyFieldLogin($Email, $Password)
{
    //returns true or false statement
    if (empty($Email) || empty($Password)) { //if one or more fields are empty
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//check if login conditions are met
function loginUser($DB, $Email, $Password)
{
    $emailExists = emailExists($DB, $Email);

    if ($emailExists === false) {
        header("location: ../login.php?error=wronglogincredentials");
        exit();
    }
    $pwd = $emailExists["passwrd"];

    if ($pwd !== $Password) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($pwd == $Password) {
        // $query = "SELECT driverNo FROM Driver WHERE email = '$emailExists';";
        // $result = mysqli_query($DB, $query);
        session_start(); //stores the _sessions to session_start
        $_SESSION['userNo'] = $emailExists["userNo"];
        $_SESSION['Email'] = $emailExists["email"];
        if ($_SESSION['Email'] == 'admin') {
            header("location: ../../html/index.html");
            exit();
        } else {
            header("location: ../../html/index.html");
            exit();
        }
    }
}
function createUser($DB, $Email, $Password, $Forename, $Surname, $DOB, $Gender)
{
    $query = "insert into TestWebsiteUser (email, passwrd, forename, surname, dob, gender)
values (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($DB); //init=initialising the stmt
    if (!mysqli_stmt_prepare($stmt, $query)) { //checks if theres any error in sql statement
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $DB, $Email, $Password, $Forename, $Surname, $DOB, $Gender); //binding the input to statement as a string (s); replace $Password with $hashedPassword to insert the hashed password instead of plaintext password
    mysqli_stmt_execute($stmt); //executing the statement
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}


