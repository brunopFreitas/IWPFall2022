<?php
require_once ("dbconn.php");

function updateEmployee($emp_no, $birthDate, $firstName, $lastName, $gender, $hireDate) {
    $conn = getDbConnection();
//    $myQuerie = "UPDATE ".
//        "employees.employees ".
//        "SET ".
//        "birth_date = ".
//        "'".
//        $birthDate.
//        "'".
//        ",".
//        "first_name = ".
//        "'".
//        $firstName.
//        "'".
//        ",".
//        "last_name = ".
//        "'".
//        $lastName.
//        "'".
//        ",".
//        "gender = ".
//        "'".
//        $gender.
//        "'".
//        ",".
//        "hire_date = ".
//        "'".
//        $hireDate.
//        "'".
//        " WHERE ".
//        "emp_no = ".
//        $emp_no;
//    $result = mysqli_query($conn,$myQuerie);
    $sql = $conn->prepare("UPDATE employees.employees SET birth_date = ?, first_name = ?, last_name = ?, gender = ?, hire_date = ? WHERE emp_no = ?");
    $sql->bind_param("sssssi", $birthDate, $firstName, $lastName, $gender, $hireDate, $emp_no);
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