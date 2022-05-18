<?php
    include_once "connect.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['uname'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = $dbconnect->query("INSERT INTO `user_info`(`name`,`userName`,`password`, `mobile`, `email`) VALUES ('$name','$username','$pass','$phone','$email')");

        if ($query) {
            header("Location:index.php?msgSuccess=Data Inserted Successfully.");
        } else header("Location:add-data.php?msgWarn=Data Not Inserted.");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APPLICATION</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200;8..144,300;8..144,400&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 g-0">
                <h1 class="display-5 text-center">COMPLETE CRUD APPLICATION WITH PHP</h1>
                <h3 class="display-6 text-center">Add Data Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
            <form action="add-data.php" method="post">
                <label class="form-label" for="name">Full Name</label>
                <input class="form-control" type="text" name="name">
                <label class="form-label" for="uname">User Name</label>
                <input class="form-control" type="text" name="uname">
                <label class="form-label" for="pass">Password</label>
                <input class="form-control" type="password" name="pass">
                <label class="form-label" for="phone">Phone Mumber</label>
                <input class="form-control" type="number" name="phone">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control" type="email" name="email"><br>

                <button class="btn btn-outline-success" type="submit" name="submit">SUBMIT</button>
                <a href="index.php" class="btn btn-outline-dark">SHOW DATA</a>
            </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <div class="container_fluid">
        <div class="row g-0">
            <div class="col-md-12 g-0 copyr">
                <p class="text-dark text-center">&copy;2021 <a href="hosenrabby.com">Hosen Rabby</a> All Rights Reserved</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>