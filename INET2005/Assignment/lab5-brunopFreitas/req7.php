<?php
require_once ("dbconn.php");

function deleteEmployee($emp_no) {
    $conn = getDbConnection();
//    $myQuerie = "DELETE ".
//        "FROM ".
//        "employees.employees ".
//        " WHERE ".
//        "emp_no = ".
//        $emp_no;
//    $result = mysqli_query($conn,$myQuerie);
    $sql = $conn->prepare("CALL deleteEmployee(?)");
    $sql->bind_param('i', $emp_no);
    $sql->execute();
    $result = $sql->affected_rows;
    $sql->close();
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}

?>