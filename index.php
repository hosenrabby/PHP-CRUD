<?php
    include_once "connect.php";

    if (isset($_POST['submit'])) {
        $userName = $_POST['uname'];
        $password = $_POST['pass'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = $dbconnect->query("INSERT INTO `user_info`(`userName`, `password`, `mobile`, `email`) VALUES ('$userName','$password','$phone','$email')");
        if ($query) {
            header("Location:show-data.php");
        } else "query unsuccessfull";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>CRUD</h2>
                <h3>ADD YOUR DATA</h3>
                
                <form action="index.php" method="post">
                    <label for="uname">User Name</label>
                    <input type="text" name="uname">
                    <label for="pass">Password</label>
                    <input type="password" name="pass">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone">
                    <label for="email">E-mail</label>
                    <input type="email" name="email">

                    <button class="button" type="submit" name="submit">SUBMIT</button>
                </form>
                <a href="show-data.php"><button class="button">SHOW AVAILABLE DATA</button></a>
            </div>
        </div>
    </div>
</body>
</html>