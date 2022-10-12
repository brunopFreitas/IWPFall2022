<?php
require_once ("dbconn.php");
function getMyLastPK() {
    $conn = getDbConnection();
    $myQuerie = "SELECT emp_no FROM employees.employees ORDER BY emp_no DESC limit 1;";
    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}

function addEmployee($emp_no, $birthDate, $firstName, $lastName, $gender, $hireDate) {
    $conn = getDbConnection();
    $myQuerie = "INSERT " .
        "INTO " .
        "employees.employees " .
        "(" .
        "`emp_no`," .
        "`birth_date`," .
        "`first_name`," .
        "`last_name`," .
        "`gender`," .
        "`hire_date`) " .
        "VALUES " .
        "(" .
        "'" .
        $emp_no .
        "'" .
        "," .
        "'" .
        $birthDate .
        "'" .
        "," .
        "'" .
        $firstName .
        "'" .
        "," .
        "'" .
        $lastName .
        "'" .
        "," .
        "'" .
        $gender .
        "'" .
        "," .
        "'" .
        $hireDate .
        "'" .
        ")";
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