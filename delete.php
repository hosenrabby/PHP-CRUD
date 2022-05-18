<?php 
    include_once "connect.php";
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = $dbconnect->query("DELETE FROM `user_info` WHERE id ='$id'");
        if ($query) {
            header("Location:index.php?msgWarn=Data Deleted Successfully.");
        } else header("Location:index.php?msgWarn=Data Not Deleted.");
    } 
?>