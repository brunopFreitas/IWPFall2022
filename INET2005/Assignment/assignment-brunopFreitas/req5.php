<?php
require_once ("dbconn.php");

function updateEmployee($emp_no, $birthDate, $firstName, $lastName, $gender, $hireDate) {
    $conn = getDbConnection();
    $myQuerie = "UPDATE ".
        "employees.employees ".
        "SET ".
        "birth_date = ".
        "'".
        $birthDate.
        "'".
        ",".
        "first_name = ".
        "'".
        $firstName.
        "'".
        ",".
        "last_name = ".
        "'".
        $lastName.
        "'".
        ",".
        "gender = ".
        "'".
        $gender.
        "'".
        ",".
        "hire_date = ".
        "'".
        $hireDate.
        "'".
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