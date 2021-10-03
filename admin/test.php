<?php

require_once 'includes/header.php';

if(isset($_GET['id']))
    {
        $del_id = $_GET['id'];
        $query = " DELETE FROM test WHERE id='$del_id'";
        $result = mysqli_query($con,$query);
    
        if($result)
        {
            header("location:testing.php");
        }
    }

?>