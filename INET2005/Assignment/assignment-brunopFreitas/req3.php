<?php
require_once ("dbconn.php");
function findEmployee($condition, $start, $limit) {
    $conn = getDbConnection();
    $myQuerie = "SELECT " .
        "* " .
        "FROM " .
        "employees.employees " .
        "WHERE " .
        "first_name " .
        "LIKE " .
        "'%" .
        $condition .
        "%'" .
        " || last_name " .
        "LIKE " .
        "'%" .
        $condition .
        "%'" .
        " ORDER BY " .
        "emp_no " .
        "LIMIT " .
        $start .
        "," .
        $limit;
    return $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}
?>