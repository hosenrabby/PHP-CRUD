<?php include_once "connect.php";?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 g-0">
                <h1 class="display-5 text-center">COMPLETE CRUD APPLICATION WITH PHP</h1>
                <h3 class="display-6 text-center">Update Data Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
            <?php
                if (isset($_GET['edit'])) {
                   $id = $_GET['edit'];
                   $query = $dbconnect->query("SELECT * FROM `user_info` WHERE id = '$id'");

                   if ($query) {
                       $udata = $query->fetch_array();
            ?>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?=$udata['id']?>">
                <label class="form-label" for="name">Full Name</label>
                <input class="form-control" type="text" name="name" value="<?=$udata['name']?>">
                <label class="form-label" for="uname">User Name</label>
                <input class="form-control" type="text" name="uname" value="<?=$udata['userName']?>">
                <label class="form-label" for="pass">Password</label>
                <input class="form-control" type="password" name="pass" value="<?=$udata['password']?>">
                <label class="form-label" for="phone">Phone Mumber</label>
                <input class="form-control" type="number" name="phone" value="<?=$udata['mobile']?>">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control" type="email" name="email" value="<?=$udata['email']?>"><br>

                <button class="btn btn-outline-success" type="submit" name="submit"><i class="fa-solid fa-file-pen"></i> UPDATE</button>
                <a href="add-data.php" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> ADD DATA</a>
                <a href="index.php" class="btn btn-outline-dark"><i class="fa-solid fa-eye"></i> SHOW DATA</a>
                <a href="befor_upd_data.php" class="btn btn-outline-dark"><i class="fa-solid fa-brush"></i> BEFOR UPDATED DATA</a>
            </form>
            <?php 
                    }
                 }

                 if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $username = $_POST['uname'];
                    $pass = $_POST['pass'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $query = $dbconnect->query("UPDATE `user_info` SET `name`='$name',`userName`='$username',`password`='$pass',`mobile`='$phone',`email`='$email' WHERE `id` = '$id'");
                    echo $query;
                    if ($query) {
                        header("Location:befor_upd_data.php?msgSuccess=Data Updated Successfully, Showing befor Updated Data.");
                    } else header("Location:edit.php?msgWarn=Data Not Updated.");
                 }
            ?>
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