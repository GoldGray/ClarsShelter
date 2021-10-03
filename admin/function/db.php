<?php
    $con = mysqli_connect("localhost", "root", "", "clarsshelter");

    if(!$con)
    {
        echo "Connection failed";
        exit();
    }
?>