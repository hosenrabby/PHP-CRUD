<?php include_once "connect.php";?>
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
                <h3>UPDATE YOUR DATA</h3>
                <?php
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $query = $dbconnect->query("SELECT * FROM `user_info` WHERE id = '$id'");
                        while ($uData = $query->fetch_assoc()) {
                ?>
                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?=$uData['id']?>">
                    <label for="uname">User Name</label>
                    <input type="text" name="uname" value="<?=$uData['userName']?>">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" value="<?=$uData['password']?>">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" value="<?=$uData['mobile']?>">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="<?=$uData['email']?>">

                    <button class="button" type="submit" name="update">UPDATE</button>
                </form>
                <?php
                }
            }
            
                    
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $userName = $_POST['uname'];
                $password = $_POST['pass'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                var_dump($_GET);
                $query = $dbconnect->query("UPDATE `user_info` SET `userName`='$userName',`password`='$password',`mobile`='$phone',`email`='$email' WHERE id = $id");
                if ($query) {
                    header("Location:show-data.php");
                } else "query unsuccessfull";
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>