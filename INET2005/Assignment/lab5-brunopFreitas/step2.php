<?php
require_once ("dbconn.php");
require_once ("debbug.php");
function findUser($userName)
{
    $conn = getDbConnection();
//    $myQuerie = "SELECT " .
//        "user_name " .
//        "FROM " .
//        "employees.user " .
//        "WHERE " .
//        "user_name " .
//        "= " .
//        "'" .
//        $userName .
//        "'";
//    $result = mysqli_query($conn, $myQuerie);
    $sql = $conn->prepare("SELECT user_name FROM employees.user WHERE user_name = ?");
    $sql->bind_param("s", $userName);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();
    closeDbConnection($conn);
    return $result;
}

function addUser($userName, $password) {

    $total_rows = mysqli_num_rows(findUser($userName));

    if($total_rows==0) {
        //    Hashing the password
        $password = hash("sha1", $password);
        $conn = getDbConnection();
//        $myQuerie = "INSERT " .
//            "INTO " .
//            "employees.user " .
//            "(" .
//            "`user_name`," .
//            "`password`)" .
//            "VALUES " .
//            "(" .
//            "'" .
//            $userName .
//            "'" .
//            "," .
//            "'" .
//            $password .
//            "'" .
//            ")";
//        $result = mysqli_query($conn,$myQuerie);
        $sql = $conn->prepare("INSERT INTO employees.user (user_name, password) VALUES (?, ?)");
        $sql->bind_param("ss",$userName, $password);
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
}
?>