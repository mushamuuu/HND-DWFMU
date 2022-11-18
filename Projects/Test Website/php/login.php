<?php
include_once 'header.php';
?>
<div class="container">

</div>
</section>
<!--main - contains the main contents of the website-->
<div class="container">
    <!--asking user to enter login details-->
    <form method="post" action="includes/login.inc.php">
        <table>
            <tr>
                <td>
                    <h2>Existing User - Please enter your Email and password
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="Email" size="30" placeholder="e.g. email@email.com"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="Password" size="10" placeholder="password.."/></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Log in</button></td>
            </tr>
            <tr>
                <td>New User? Click button below</td>
            </tr>
            <tr>
                <td><a href="#"><button type="button" onclick="signup()" alt="signup">Sign up</a></td>
            </tr>
            <tr>
                <td>
                    <?php
                    //error reporting
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfield") {
                            echo "<p>Fill in all fields.</p>";
                        }
                        if ($_GET["error"] == "wronglogincredentials") {
                            echo "<p>Wrong login credentials.</p>";
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
    <p>Copyright &copy;2022 Test Website</p>
</footer>
</body>

</html>