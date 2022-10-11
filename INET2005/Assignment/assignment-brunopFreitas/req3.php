<?php
require_once ("dbconn.php");
function findEmployee($condition) {
    $conn = getDbConnection();
    $myQuerie = "SELECT " .
        "* " .
        "FROM " .
        "employees.employees " .
        "WHERE " .
        "first_name " .
        "LIKE " .
        "'%" .
        $_POST['word'] .
        "%'" .
        " || last_name " .
        "LIKE " .
        "'%" .
        $_POST['word'] .
        "%'" .
        " ORDER BY " .
        "emp_no " .
        "LIMIT " .
        "0,25";
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}
?>