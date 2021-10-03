<?php require_once 'includes/header.php';

   
    $value = view_test();
  
  

?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/topbar.php'; ?>

<div class="container-fluid">

<div   div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">test</h1>
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
                                                    <td> <?php echo $row['name_1']; ?> </td>
                                                   
                                                    <td class = "text-center">

                                                         

                                                       
                                                        <a href="edit_cat.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"> Edit</a>
                                                        <a href="test.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"> Delete</a>
                                                        
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