<?php require_once 'includes/header.php';

   
    $value = view_cat();
    active_status();
  

?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/topbar.php'; ?>

<div class="container-fluid">

<div   div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Categories</h1>
</div>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th colspan="3">Operations</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php


                                                while($row = mysqli_fetch_assoc($value))
                                                {
                                                    ?>
                                                    <td> <?php echo $row['id']; ?> </td>
                                                    <td> <?php echo $row['cat_name']; ?> </td>
                                                    <td> 
                                                        <?php  
                                                        
                                                            if($row['status']=='1')
                                                            {
                                                                echo "Active";
                                                            }
                                                            else
                                                            {
                                                                echo "Deactive";
                                                            }
                                                        
                                                        ?> 

                                                    </td>
                                                    <td class = "text-center">

                                                         <?php  
                                                        
                                                             if($row['status']=='1')
                                                            {
                                                                 echo "<a href='manage_category.php?opr=deactive&id=".$row['id']."' class='btn btn-warning btn-sm'> Deactive </a>";
                                                             }
                                                            else 
                                                            {
                                                                 echo "<a href='manage_category.php?opr=active&id=".$row['id']."' class='btn btn-warning btn-sm'> Active </a>";
                                                            }
                                                    
                                                         ?> 

                                                       
                                                        <a href="edit_cat.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"> Edit</a>
                                                        <a href="del_cat.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"> Delete</a>
                                                        
                                                    </td>                          
                                        </tr>
                                       <?php
                                                }

                                        ?> 



                                       
                                    </tbody>
                                   
                                   
                                </table>
                            </div>
                        </div>
                    </div>

</div>


<?php require_once 'includes/footer.php';?>
<?php require_once 'includes/scripts.php'; ?>