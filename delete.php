<?php 
    include_once "connect.php";
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = $dbconnect->query("DELETE FROM `user_info` WHERE id ='$id'");
        if ($query) {
            header("Location:deleted_data.php?msgWarn=Data Temporary Deleted Successfully.");
        } else header("Location:index.php?msgWarn=Data Not Deleted.");
    } 
    if (isset($_GET['permDelete'])) {
        $id = $_GET['permDelete'];

        $query = $dbconnect->query("DELETE FROM `show_dlt_data` WHERE id ='$id'");
        if ($query) {
            header("Location:index.php?msgWarn=Data Deleted Successfully.");
        } else header("Location:index.php?msgWarn=Data Not Deleted.");
    } 
    if (isset($_GET['befrDelete'])) {
        $id = $_GET['befrDelete'];

        $query = $dbconnect->query("DELETE FROM `befor_upd_data` WHERE id ='$id'");
        if ($query) {
            header("Location:index.php?msgWarn=Data Deleted Successfully.");
        } else header("Location:index.php?msgWarn=Data Not Deleted.");
    } 
?>