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
            <div class="column column-70 column-offset-5">
                <h2>Data Manupulating</h2>
                <a href="index.php"><button class="button">ADD DATA</button></a>
                <table cellspacing="0" cellpading="0">
                    <tr>
                        <th>id</th>
                        <th>User Name</th>
                        <th>User Password</th>
                        <th>Mobile Number</th>
                        <th>E-mail</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    <?php
                        $x=0;
                        $query = $dbconnect->query("SELECT * FROM `user_info`");
                            while ($sData = $query->fetch_assoc()) {
                                $x++;
                    ?>
                    <tr>
                        <td><?=$x?></td>
                        <td><?=$sData['userName']?></td>
                        <td><?=$sData['password']?></td>
                        <td><?=$sData['mobile']?></td>
                        <td><?=$sData['email']?></td>
                        <td><a class="button" href="edit.php?edit=<?=$sData['id']?>">EDIT</a></td>
                        <td><a class="button" href="delete.php?delete=<?=$sData['id']?>">DELETE</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>