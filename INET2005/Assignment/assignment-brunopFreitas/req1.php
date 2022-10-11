<?php
require_once ("dbconn.php");
function countEmployee () {
    $conn = getDbConnection();
    $myQuerie = "SELECT " .
        "* " .
        "FROM " .
        "employees.employees";
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}

function displayEmployeePage($start, $limit) {
    $conn = getDbConnection();
    $myQuerie = "SELECT " .
        "* " .
        "FROM " .
        "employees.employees " .
        "LIMIT " .
        $start .
        "," .
        $limit;
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
    return $result;
    }
    closeDbConnection($conn);

}