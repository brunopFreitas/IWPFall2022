<?php
require_once ("dbconn.php");

function deleteEmployee($emp_no) {
    $conn = getDbConnection();
    $myQuerie = "DELETE ".
        "FROM ".
        "employees.employees ".
        " WHERE ".
        "emp_no = ".
        $emp_no;
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return mysqli_affected_rows($conn);
    }
    closeDbConnection($conn);
}

?>