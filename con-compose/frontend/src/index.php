<?php
    phpinfo();

    try {
        $serverName = "yourServername";
        $connectionOptions = array(
            "database" => "yourDatabase",
            "uid" => "yourUsername",
            "pwd" => "yourPassword"
        );

        // Establishes the connection
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            throw new Exception((formatErrors(sqlsrv_errors())));
        }

        // Select Query
        $tsql = "SELECT @@Version AS SQL_VERSION";

        // Executes the query
        $stmt = sqlsrv_query($conn, $tsql);

        // Error handling
        if ($stmt === false) {
            throw new Exception(formatErrors(sqlsrv_errors()));
        }
    } catch (Exception $e) {
        echo $e;
    }
?>
