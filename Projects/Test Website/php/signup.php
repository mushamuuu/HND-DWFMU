<?php
include_once 'header.php';
?>
<div class="container">
    </br>
    </br>
</div>
</section>
<!--main - contains the main contents of the website-->
<div class="container">
    <!--contains the form-->
    <form method="post" action="includes/signup.inc.php">
        <table>
            <!--asks users some information-->
            <tr>
                <td>
                    <h2>Register User details</h2>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="Email" size="30" placeholder="e.g. email@email.com"/> </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="Password" name="Password" size="10" placeholder="password.."/> </td>
            </tr>

            <tr>
                <td>Forename:</td>
                <td><input type="text" name="Forename" size="10" placeholder="forename.."/> </td>
            </tr>

            <tr>
                <td>Surname:</td>
                <td><input type="text" name="Surname" size="10" placeholder="surname.."/> </td>
            </tr>
            
            <tr>
                <td>Date of Birth :</td>
                <td> <input type="date" id="birthday" name="DOB" /></td>
            </tr>
            <tr>
                <td>Gender (M/F):</td>
                <td><input type="radio" id="male" name="Gender" value="M">
                    <label for="male">Male</label>
                </td><br>
                <td><input type="radio" id="female" name="Gender" value="F">
                    <label for="female">Female</label>
                </td><br>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Sign up</button></td>
            </tr>
            <tr>
                <td><a href="#"><button type="button" onclick="login()" alt="login">Back to Login</a></td>
            </tr>
            <tr>
                <td>
                    <?php
                    //error reporting
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfield") {
                            echo "<p>Fill in all fields.</p>";
                        }
                        if ($_GET["error"] == "invalidEmail") {
                            echo "<p>Invalid Email.</p>";
                        }
                        if ($_GET["error"] == "EmailAlreadyExists") {
                            echo "<p>Email already exists.</p>";
                        }
                        if ($_GET["error"] == "stmtfailed") {
                            echo "<p>An Error occured. Please try again.</p>";
                        }
                        if ($_GET["error"] == "none") {
                            echo "<p>Signup Success.</p>";
                            echo "<p>Click the Login/Signup to sign in.</p>";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</div>
<!--footer-->
<footer id="footer">
    <p>Copyright &copy;2021 iCars</p>
</footer>
</body>

</html>