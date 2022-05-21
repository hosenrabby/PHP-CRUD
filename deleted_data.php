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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200;8..144,300;8..144,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 g-0">
                <h1 class="display-5 text-center">COMPLETE CRUD APPLICATION WITH PHP</h1>
                <h3 class="display-6 text-center">Deleted Data Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <?php
                if (isset($_GET['msgSuccess'])) {
                    $msg = $_GET['msgSuccess'];
                    echo "<div class='alert alert-success alert-dismissible'>
                    $msg <i class='fa-solid fa-square-check'></i> 
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              </div>";
                }
                if (isset($_GET['msgWarn'])) {
                    $msg = $_GET['msgWarn'];
                    echo "<div class='alert alert-danger alert-dismissible' >
                    $msg <i class='fa-solid fa-triangle-exclamation'></i> 
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              </div>";
                }
            ?>
                <table class="table table-light table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>USER NAME</th>
                            <th>PASSWORD</th>
                            <th>MOBILE</th>
                            <th>EMAIL</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = $dbconnect->query("SELECT * FROM `show_dlt_data`");
                        $x=1;
                        if ($query) {
                            while ($sdata = $query->fetch_array()) {
                    ?>
                        <tr>
                            <td><?=$x++?></td>
                            <td><?=$sdata['name']?></td>
                            <td><?=$sdata['userName']?></td>
                            <td><?=$sdata['password']?></td>
                            <td><?=$sdata['mobile']?></td>
                            <td><?=$sdata['email']?></td>
                            <td>
                                <a class="btn btn-outline-danger btn-sm" href="delete.php?permDelete=<?=$sdata['id']?>"><i class="fa-solid fa-trash-can"></i> PERMANENTLY DELETE</a>
                            </td>
                        </tr>
                    <?php 
                            }
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>ID</td>
                            <td>NAME</td>
                            <td>USER NAME</td>
                            <td>PASSWORD</td>
                            <td>MOBILE</td>
                            <td>EMAIL</td>
                            <td colspan="2">ACTIONS</td>
                        </tr>
                    </tfoot>
                </table>
                <a href="add-data.php" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> ADD DATA</a>
                <a href="index.php" class="btn btn-outline-dark"><i class="fa-solid fa-brush"></i> SHOW DATA</a>
                <a href="befor_upd_data.php" class="btn btn-outline-dark"><i class="fa-solid fa-brush"></i> BEFOR UPDATED DATA</a>
            </div>
            <div class="col-md-1"></div>
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