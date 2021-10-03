<?php 

require_once 'db.php';


//display Animals
function display_cat()
{
    global $con;
    $query = "SELECT * FROM categories WHERE status=1";
     return $result = mysqli_query($con,$query);
}

//get safe value
function safe_value($con,$value)
{
    return mysqli_real_escape_string($con,$value);
}

//get animals

function get_animals($cat_id='', $animal_id = '')
{
    global $con;
    $query = "SELECT * FROM animals WHERE status=1";

    if ($cat_id!='')
    {
        $query = "SELECT * FROM animals WHERE category_name=$cat_id ";
    }

    if ($animal_id!='')
    {
        $query = "SELECT * FROM animals WHERE id=$animal_id ";
    }

    return $result = mysqli_query($con,$query);
}


//display cat links

function display_cat_links($category_id='')
{

global $con;
$query = "SELECT animals.id, animals.category_name, categories.cat_name FROM animals INNER JOIN categories ON animals.category_name=categories.id WHERE animals.category_name='$category_id' ";
return $result = mysqli_query($con,$query);
}




?>