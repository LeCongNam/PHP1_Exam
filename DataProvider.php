<?php

class DataProvider
{
    public static function executeQuery($sql)
    {
        include('db.inc');
        include_once("error.inc");

        // 1. connect Database
        if (!($conn = mysqli_connect($servername, $username, $password, $dbname))) {
            die("couldn't  connect to localhost!");
        }

        // 2. set type chart utf8
        if (!(mysqli_query($conn, "set names `utf8`"))) {
            showError($conn);
        }
        // Exec sql query
        if (!($result = mysqli_query($conn, $sql))) {
            showError($sql);
        }
        // 3. Disconnection with DataBase
        if (!(mysqli_close($conn))) {
            showError($conn);
        }

        return $result;


        function showError($err)
        {
            die("Error " . mysqli_error($err));
        }
    }
}
