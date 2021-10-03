
<?php require_once 'includes/header.php' ?>
<?php 
    require_once 'includes/navbar.php'; 
    
    $animal_id = "";
    if(isset($_GET['a_id']))
    {
        $animal_id = $_GET['a_id'];
    }

    $animals = get_animals('',$animal_id);
    $result = mysqli_fetch_assoc($animals);
    
    
    
    ?>

    <!-- Animal details -->
    <div class="container product-details mb-5">
      <div class="row">
        <div class="col-md-6 details">
          <h2>Adopt</h2>
          <h2><?php echo $result ['name'] ?></h2>
          <h5>Age: <?php echo $result ['age'] ?></h5>
          <h5>Gender: <?php echo $result ['gender'] ?></h5>
          <h5>Size: <?php echo $result ['size']?></h5>

          <div class="bars mt-4">
            <span>Affectionate</span>
          <div class="progress">
            
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <span>Energetic</span>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <span>Kid Friendly</span>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <span>Likes other animals</span>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <button href="#" class="btn btn-info btn-lg w-100 mt-4">Apply to Adopt</button>

         </div>
      </div>

        <div class="col-md-6">
          <div class="image1">
            <a href="">
              <img src="admin/image/<?php echo $result['img'] ?>" class="w-100" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <section class="details-home">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 story">
            <h2 class="text-primary">Darky's Story</h2>
            <p>
            <?php echo $result ['description'] ?>
            </p>

           
          </div>

          <div class="col-md-6 col-lg-4">
      
          <h2 class="text-primary">Ideal Home</h2>
          <p>
          <?php echo $result ['ideal_home'] ?>
          </p>
          

        
            
            
           
          </div>

          <div class="col-md-6 col-lg-5 fourpics">
            <div class="d-flex  flex-md-wrap mt-5 mx-4">
              <img src="/img/dark.jpeg" class="image3" width="150px" height="150px" alt="">
              <img src="/img/dark.jpeg" class="image3" width="150px" height="150px" alt="">
              <img src="/img/dark.jpeg" class="image3" width="150px" height="150px" alt="">
              <img src="/img/dark.jpeg" class="image3" width="150px" height="150px" alt="">
             
            </div>
        </div>
       
      </div>
    </section>

    <!-- just to spaceout(temporary) -->

    <header class="header-section">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 text-center text-lg-left">
              <a href="">
                <img src="" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>


<?php require_once 'includes/footer.php' ?>