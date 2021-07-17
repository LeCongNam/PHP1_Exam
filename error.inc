<?php 

    function showError($err){
        die("Error ".mysqli_error($err));
    }
?>