<?php
    function getDbConnection()
    {
        // IF in a modern way
        // $host = isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"] : "localhost
        // $host = $_ENV["DB_HOST"] ?? "localhost"

//        $host = $_ENV["DB_HOST"] ?? "w0448225.cqfi4rqyzyat.us-east-1.rds.amazonaws.com";
//        $username = $_ENV["DB_USERNAME"] ?? "root";
//        $password = $_ENV["DB_PASSWORD"] ?? "inet2005";
//        $database = $_ENV["DB_DATABASE"] ?? "employees";

        $host = $_ENV["DB_HOST"];
        $username = $_ENV["DB_USERNAME"];
        $password = $_ENV["DB_PASSWORD"];
        $database = $_ENV["DB_DATABASE"];

        $conn = mysqli_connect($host, $username, $password, $database);
        if(!$conn)
        {
            die("Unable to connect to database: " . mysqli_connect_error());
        }

        return $conn;
    }

    function closeDbConnection($conn): void
    {
        closeDbConnection($conn);
    }