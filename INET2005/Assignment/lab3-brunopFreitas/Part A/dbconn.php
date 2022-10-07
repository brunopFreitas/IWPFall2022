<?php
    function getDbConnection()
    {
        $conn = mysqli_connect("localhost", "root", "#Admin@1234", "sakila");
        if(!$conn)
        {
            die("Unable to connect to database: " . mysqli_connect_error());
        }

        return $conn;
    }

    function closeDbConnection ($conn): void
    {
        mysqli_close($conn);
        echo "<script> console.log('Closing connection');</script>";
    }


