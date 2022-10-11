<?php
require_once ("dbconn.php");
function countMyRows($table) {
    $conn = getDbConnection();
    $myQuerie = "SELECT " .
        "* " .
        "FROM " .
        "count ('" .
        $table .
        "')";
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);

}