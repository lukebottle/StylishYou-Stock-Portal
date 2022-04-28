<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Stock Management Login</title>

    <!-- My CSS -->
    <link rel='stylesheet' type='text/css' href="./static/css/theme.css">
    <link rel='stylesheet' type='text/css' href='./static/css/login.css'>
    <!-- My Javascript -->
    <script src="./static/javascript/theme.js" defer></script>
</head>

<body data-theme="theme">
    <section>

        <?php

        // database connect script.
        require 'db_connect.php';

        // Capture the data from the form
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_POST["Username"]) && !empty($_POST["Password"])) {
                $Db_Username = $_POST['Username'];
                $Db_Password = $_POST['Password'];

                // SQL Query to check the details
                $sql = "SELECT Username, Password FROM UserDetails WHERE Username = '$Db_Username' AND Password = '$Db_Password'";

                // Run the query.
                $results = odbc_exec($connect, $sql);

                // Count the number of rows returned ( 0 = wrong user or password)
                $count_results = odbc_num_rows($results);

                if ($count_results >= 1) {
                    $_SESSION['Logged_in'] = 1;
                    $_SESSION['Username'] = $Db_Username;
                    header("Location:home.php"); //Redirect to main page.
                    exit();
                } else {
                    //ADD SOMETHING ON SCREEN TO SHOW ERROR. 
                    echo ("");
                }




                odbc_close($connect);
            }
        }

        ?>


        <?php
        echo
        "<div class='bg-color-left'>
        
        <img src='./static/css/Images/StylishYou_Logo_Main.png' alt=''>
        </div>
        <img class='MainImage' src='static/css/Images/LoginImage.svg' alt=''>
        <div class='container'>
        <h2>StylishYou</h2>
        <form class='form' name='login' action=''. method='post'>
        <input class='InputSmall' type='text' placeholder='Username' id='UserHead' name='Username'>
        <input class='InputSmall' type='password' placeholder='Password' id='PassHead' name='Password'>
        <button type='submit' name='submit' id='login-button' onclick='home.php'>Log in</button>
        </form>
        </div>
        </div>
        ";
        ?>



    </section>
</body>

</html>