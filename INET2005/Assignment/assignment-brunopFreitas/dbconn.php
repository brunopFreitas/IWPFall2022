<?php
    function getDbConnection()
    {
        // IF in a modern way
        // $host = isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"] : "localhost
        // $host = $_ENV["DB_HOST"] ?? "localhost"

        $host = $_ENV["DB_HOST"] ?? "localhost";
        $username = $_ENV["DB_USERNAME"] ?? "root";
        $password = $_ENV["DB_PASSWORD"] ?? "inet2005";
        $database = $_ENV["DB_DATABASE"] ?? "employees";

        $conn = mysqli_connect($host, $username, $password, $database);
        if(!$conn)
        {
            die("Unable to connect to database: " . mysqli_connect_error());
        }

        return $conn;
    }

    function closeDbConnection($conn): void
    {
        mysqli_close($conn);
    }