<?php

function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['MESSAGE'] = $msg;
    }
    else
    {
        $msg = "";
    }
}

    //display message

    function display_message()
    {
        if(isset($_SESSION['MESSAGE']))
        {
            echo $_SESSION['MESSAGE'];
            unset($_SESSION['MESSAGE']);
        }
    }

    //error msg
   function display_error($error)
   {
       return "<span class='alert alert-danger text-center'>$error</span>";
   }

   //success message
   function display_success($error)
   {
       return "<span class='alert alert-success text-center'>$error</span>";
   }

   //get safe value

   function safe_value($con,$value)
   {
       return mysqli_real_escape_string($con,$value);
   }


   //login check
   function login_system()
   {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login']))
    {
        global $con;
        $username = safe_value($con,$_POST['username']);
        $password = safe_value($con,$_POST['password']);
        
        if(empty($username) || empty($password))
        {
            set_message(display_error("Please fill the forms"));
        }
        else
             {
                 //query
                 $query = "SELECT * FROM users WHERE username='$username' or email='$username' AND password='$password' ";
                 $result = mysqli_query($con,$query);
  
                 if(mysqli_fetch_assoc($result))
                 {              
                    $_SESSION['ADMIN']=$username;
                    header("location: ./index.php");
                 }
                  else
                 {
                     set_message(display_error("you have entered a wrong password/username"));
                 }
 
        }
 
    }
 
   }

  
//add categories
function add_category()
   {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn']))
    {
        global $con;
       $category = safe_value($con,$_POST['category']);
       
        if(empty ($category))
        {
           
            set_message(display_error("please enter Category Name"));
        }
        else
        {
            //see if thers existing data on the database
            $sql = "SELECT * FROM categories WHERE cat_name = '$category' ";
            $check = mysqli_query($con, $sql);

            if(mysqli_fetch_assoc($check))
            {
                set_message(display_error("category already created"));
            }
            else
            {
                $query = "INSERT INTO categories(cat_name ,status) values('$category','1')";
            $result = mysqli_query($con,$query);
            if($result)
            {
                set_message(display_success("a category has been added"));
                echo "<a href='manage_category.php'> View Category </a>";
            }
            }
        }




    }

   }


//view category
function view_cat()
{
    global $con;
    $sql = "SELECT * FROM categories ";
    return  mysqli_query($con, $sql);
}

//category status active or deactive

function active_status()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr']!="")
    {
        $operation = safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation=='active')
        {
            $status = 1;
        }else{
            $status = 0;
        }

        $query = "UPDATE categories SET status='$status' WHERE id='$id'";
        $result = mysqli_query($con,$query);

        if($result){
            header("location:manage_category.php");
            set_message(display_success("category has been updated"));
        }

    }

}

//category update

function update_cat()
{
    global $con;
    if(isset($_POST['cat_btn_up']))
    {
        $category_name = safe_value($con,$_POST['category_up']);
        $id = safe_value($con,$_POST['cat_id']);

            if(!empty($category_name))
            {
                $sql = "UPDATE categories SET cat_name= '$category_name' WHERE id='$id' ";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    header("location:manage_category.php");
                }

            }



        
    }

}

//Animals page ---------------------

function save_animals()
{
    global $con;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['animal_add_btn']))
    {
        

        $cat_id = safe_value($con,$_POST['cat_id']);
        $animal_name = safe_value($con, $_POST['name']);
        $animal_gender = safe_value($con, $_POST['gender']);
        $animal_age = safe_value($con, $_POST['age']);
        $animal_size = safe_value($con, $_POST['size']);
     
        $animal_desc = safe_value($con, $_POST['description']);
        $animal_ideal = safe_value($con, $_POST['idealhome']);
        
       $img = $_FILES['images']['name'];
       $type = $_FILES['images']['type'];
       $tmp_name = $_FILES['images']['tmp_name'];
       $size = $_FILES['images']['size'];

       $img_ext = explode('.',$img);
       $img_correct_ext = strtolower(end($img_ext));
       $allow = array('png','jpeg','jpg');
       $path = "image/".$img;

       if(empty($animal_name) || empty($animal_gender) || empty($animal_age) || empty($animal_size) || empty($animal_desc) || empty($animal_ideal) || empty($img) )
       {
        set_message(display_error(" Fill up the reaming form"));
       }
       else
       {
        if(in_array($img_correct_ext,$allow))
        {
            if($size<1000000)
            {
                if($cat_id == 0)
                {
                    set_message(display_error(" select a category"));
                }
                else
                {
                    $exit = " SELECT * FROM animals WHERE name='$animal_name'";
                    $sql = mysqli_query($con, $exit);

                    if(mysqli_fetch_assoc($sql))
                    {
                        set_message(display_error(" Animal Name already Given"));
                    }
                    else
                    {
                        $query= "INSERT INTO animals (category_name,name,age,gender,size,status,img,description,ideal_home) values('$cat_id', '$animal_name','$animal_age','$animal_gender', '$animal_size','1', '$img','$animal_desc', '$animal_ideal') " ;
                $result = mysqli_query($con,$query);

                if($result){
                    set_message(display_success(" animal added"));
                    move_uploaded_file($tmp_name,$path);
                    }
                }

                }
            } else
            {
                set_message(display_error(" image size too large"));
            }
    
        }
        else
        {
            set_message(display_error(" you cant store those format"));
        }
       
      
       }

    }
}


//view animals

function view_animal()
{
    global $con;
    $query = "SELECT animals.id, categories.cat_name, animals.name, animals.age, animals.gender, animals.size, animals.status, animals.img, animals.description, animals.ideal_home FROM animals INNER JOIN categories on animals.category_name = categories.id"; 
    return $result = mysqli_query($con,$query);



}

//Animal Status

function active_status_animal()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr']!="")
    {
        $operation = safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation=='active')
        {
            $status = 1;
        }else{
            $status = 0;
        }

        $query = "UPDATE animals SET status='$status' WHERE id='$id'";
        $result = mysqli_query($con,$query);

        if($result){
            header("location:manage_animal.php");
            set_message(display_success("animal has been updated"));
        }

    }

}

//edit product

function edit_animal()
{
    global $con;
    if(isset($_GET['id']))
    {
        $edit_id = safe_value($con,$_GET['id']);
        $query = "SELECT * FROM animals where id='$edit_id' ";
        $res =  mysqli_query($con,$query);
        return $res;
    }
}

//update animal details

function up_animal_details()
{
    global $con;
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['animal_edit_btn']) )
    {
        $cat_id = safe_value($con,$_POST['cat_id']);
        $animal_id = safe_value($con, $_POST['animal_id']);
        $animal_name = safe_value($con, $_POST['name']);
        $animal_gender = safe_value($con, $_POST['gender']);
        $animal_age = safe_value($con, $_POST['age']);
        $animal_size = safe_value($con, $_POST['size']);
     
        $animal_desc = safe_value($con, $_POST['description']);
        $animal_ideal = safe_value($con, $_POST['idealhome']);
        
       $img = $_FILES['images']['name'];
       $type = $_FILES['images']['type'];
       $tmp_name = $_FILES['images']['tmp_name'];
       $size = $_FILES['images']['size'];

       $img_ext = explode('.',$img);
       $img_correct_ext = strtolower(end($img_ext));
       $allow = array('png','jpeg','jpg');
       $path = "image/".$img;

       if(empty($animal_name) || empty($animal_gender) || empty($animal_age) || empty($animal_size) || empty($animal_desc) || empty($animal_ideal)  )
       {
        set_message(display_error(" Fill up the remaning form"));
       }
       else
       {
        
        if(empty($img))
        {
            if($cat_id == 0)
                {
                    set_message(display_error(" select a category"));
                }
                else
                {
                   $query = "UPDATE animals SET category_name='$cat_id', name='$animal_name', gender='$animal_gender', age='$animal_name', gender='$animal_gender', size='$animal_size', description='$animal_desc', ideal_home='$animal_ideal', name='$animal_name' WHERE id='$animal_id' ";
                   $result = mysqli_query($con,$query);

                   if($result)
                   {
                    set_message(display_success("Animal details has been updated"));
                    move_uploaded_file($tmp_name,$path);
                   }

                }

             
    
        }
        else {

            if($size<1000000)
            {
                if(in_array($img_correct_ext,$allow))
            {
                $query = "UPDATE animals SET category_name='$cat_id', name='$animal_name', gender='$animal_gender', age='$animal_name', gender='$animal_gender', size='$animal_size', description='$animal_desc', ideal_home='$animal_ideal', name='$animal_name', img='$img' WHERE id='$animal_id' ";
                   $result = mysqli_query($con,$query);

                   if($result)
                   {
                    set_message(display_success("Animal details has been updated"));
                    move_uploaded_file($tmp_name,$path);
                   }
            }
            else
            {
                 set_message(display_error(" you cant store those format"));
            }
            } 
            else
            {
                set_message(display_error(" image size too large"));
            }

            
        }
        }
    }
}

///////////contact us page

function contact()
{
    global $con;
    $sql = "SELECT * FROM contact ";
    return $query = mysqli_query($con, $sql);
}








?>
