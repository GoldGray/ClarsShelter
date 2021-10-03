<?php require_once 'includes/header.php';

    $cat=view_cat();
   

?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/topbar.php'; ?>

<div class="container-fluid">

<div   div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Animals</h1>
    <?php 
             save_animals();
            display_message(); ?>
</div>


<div class="content-wrapper">
    

    <div class="page-content fade-in-up">
           
   
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                
            <form method="POST" enctype="multipart/form-data"> 
                <div class="form-group ">
                
                    <label   label for="exampleInputEmail1">Category Name</label>
                    <div class ="mb-3 ">
                    <select name="cat_id" id="" class="form-control" >
                        <option value=""> Select Category</option>

                        <?php 
                        
                        while($row = mysqli_fetch_assoc($cat))
                        {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>

                    <?php
                        }
                        
                        ?>

                    </select>
                    </div>
                        <div class="form-group col-8" >
                    <label   label for="exampleInputEmail1" required>Animal Name</label>
                    <input type="text" class="form-control" name="name" required>

                    <div>
                    <select class="my-3" name="gender" id="">
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                    </select>
                    </div>

                    <label   label for="">Age:</label>
                    <input type="text" class="form-control" name="age" required>
                      <div> 
                    <select class="my-3" name="size" id="">
                        <option value="">Size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                    </div>
                    

                    <label   label for="">Picture</label>
                    <input type="file" class="form-control" text = "text" name="images" required>

                   

                    <label   label for="exampleInputEmail1">Description</label>
                    <textarea type="text" class="form-control" name="description" required> </textarea>

                    <label   label for="exampleInputEmail1">Ideal Home</label>
                    <textarea type="text" class="form-control" name="idealhome" required> </textarea>
                    </div>
                    
                
                
                 <button type="submit" class="btn btn-primary mt-3" name="animal_add_btn">Submit</button>



                
                 
            </form>

            </div>
        </div>
    </div>


    </div>


</div>
</div>
</div>


<?php require_once 'includes/footer.php';?>
<?php require_once 'includes/scripts.php'; ?>