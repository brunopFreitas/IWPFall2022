<?php
require_once ("dbconn.php");
require_once ("debbug.php");

function findEmployee($condition) {
    $conn = getDbConnection();
//    $myQuerie = "SELECT " .
//        "* " .
//        "FROM " .
//        "employees.employees " .
//        "WHERE " .
//        "first_name " .
//        "LIKE " .
//        "'%" .
//        $condition .
//        "%'" .
//        " || last_name " .
//        "LIKE " .
//        "'%" .
//        $condition .
//        "%'" .
//        " ORDER BY " .
//        "emp_no ";
//
//    return $result = mysqli_query($conn,$myQuerie);
    $sql = $conn->prepare("SELECT * FROM employees.employees WHERE first_name LIKE ? || last_name LIKE ? ORDER BY emp_no");
    $condition = "%$condition%";
    $sql->bind_param("ss", $condition, $condition);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}

function findEmployeeByID($id) {
    $conn = getDbConnection();
//    $myQuerie = "SELECT " .
//        "* " .
//        "FROM " .
//        "employees.employees " .
//        "WHERE " .
//        "emp_no " .
//        "= " .
//        $id;
//
//    return $result = mysqli_query($conn,$myQuerie);
    $sql = $conn->prepare("SELECT * FROM employees.employees WHERE emp_no = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    } else {
        return $result;
    }
    closeDbConnection($conn);
}


function findEmployeeLimit($condition, $start, $limit) {
    $conn = getDbConnection();
//    $myQuerie = "SELECT " .
//        "* " .
//        "FROM " .
//        "employees.employees " .
//        "WHERE " .
//        "first_name " .
//        "LIKE " .
//        "'%" .
//        $condition .
//        "%'" .
//        " || last_name " .
//        "LIKE " .
//        "'%" .
//        $condition .
//        "%'" .
//        " ORDER BY " .
//        "emp_no " .
//        "LIMIT " .
//        $start .
//        "," .
//        $limit;
//    return $result = mysqli_query($conn,$myQuerie);
    $sql = $conn->prepare("SELECT * FROM employees.employees WHERE first_name LIKE ? || last_name LIKE ? ORDER BY emp_no LIMIT ?,?");
    $condition = "%$condition%";
    $sql->bind_param("ssii", $condition, $condition, $start, $limit);
    $sql->execute();
    $result = $sql->get_result();
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