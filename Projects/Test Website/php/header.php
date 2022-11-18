<?php
include_once 'includes/functions.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--tab name-->
    <title>Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <!--header-->
    <header id="header">
        <div class=container>
            <h1>Test</h1>
        </div>
    </header>
    <!--navbar-->
    <nav id="navbar">
        <div class="container">
            <ul>
                <?php
                //if $_SESSION is empty
                if (empty($_SESSION['Email'])) {
                    echo "<li><a class='navtext' href='index.php'>Home</a></li>";
                    echo "<li><a class='navtext' href='login.php'>Login/Signup</a></li>";
                }
                //if admin is logged in
                else if (isset($_SESSION['Email']) && $_SESSION['Email'] == 'admin') {
                    echo "<li><a class='navtext' href='includes/logout.inc.php'>Logout</a></li>";
                }
                //regular user
                else {
                    echo "<li><a class='navtext' href='includes/logout.inc.php'>Logout</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <!--showcase-->
    <section id="showcase">