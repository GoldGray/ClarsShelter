<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/navbar.php' ?>


<?php 
    $cat_id = "";
    if(isset($_GET['id']))
    {
        $cat_id = mysqli_real_escape_string($con,$_GET['id']);
    }

    $particular_animal = get_animals($cat_id);
    $display_cat_links = display_cat_links($cat_id);
    $result = mysqli_fetch_assoc($display_cat_links);


?>
	
	<!-- End Navigation -->

        <!-- Product Grid -->
<div class="container">
    <div class="row">

        <?php

            if(mysqli_num_rows($particular_animal))
            {


                while($row = mysqli_fetch_assoc($particular_animal))
                {
                    ?>

                    
        <div class="col-md-4 product-grid">
            <div class="row">
            <div class="image">


                <a href="animal_details.php?a_id=<?php echo $row ['id'] ?>">
                    <img src="admin/image/<?php echo $row['img']?>" class="w-100" alt="">
                </a>
                    <h4 class="text-center"><?php echo $row ['name']  ?></h4>
            </div>
            </div>
        </div>
        
        <?php

                    
                }

            }
            else
            {
                echo "record not here";
            }

        ?>


       
    </div>
</div>





<!-- just to spaceout(temporary) -->

<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
                
            </div>
        </div>
    </div>



</header>


<?php require_once 'includes/footer.php' ?>