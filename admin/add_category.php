<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/topbar.php'; ?>

<div class="container-fluid">

<div   div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
    <?php 
             add_category();
             display_message(); ?>
</div>


<div class="content-wrapper">
    

    <div class="page-content fade-in-up">
           
   
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                
            <form method="POST"> 
                <div class="form-group">
                    <label   label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category">
                
               

                
                 <button type="submit" class="btn btn-primary mt-3" name="cat_btn">Submit</button>
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