<?php  
require_once 'functions/function.php';
$cat = display_cat();
?>


<!-- Top Bar -->
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
	
	<!-- End Top Bar -->


	<!-- Navigation -->
<nav class="navbar bg-primary navbar-dark navbar-expand-lg py-4">
	<div class="container">
		<a href="" class="navbar-brand ml-0"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" 
		data-target="#navbarres">
			<span class="navbar-toggler-icon mr-auto"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarres">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>

					<li class="nav-item dropdown">
						<a href="#" class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
							Our Organization
						</a>

						<ul class="dropdown-menu">
                            
                        <li><a href="" class="dropdown-item">About us</a></li>
						<li><a href="" class="dropdown-item">Our Policies</a></li>
						

                            

						</ul>
						
						
					</li>

                    
					<li class="nav-item dropdown">
						<a href="animals.php" class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
							Animals
						</a>

						<ul class="dropdown-menu">
                            
                        <li><a href="" class="dropdown-item">Apply to Adopt</a></li>
						<div class="dropdown-divider"></div>
							


                        
                                <?php

                                while($row = mysqli_fetch_assoc($cat))
                                {
                                    ?>
                                <li><a href="animals.php?id=<?php echo $row['id'] ?>" class="dropdown-item"><?php echo $row['cat_name'] ?></a></li>
                                    <?php
                                }
                                ?>
                            

                            

						</ul>

						<li class="nav-item dropdown">
						<a href="#" class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
							FAQ's
						</a>

						<ul class="dropdown-menu">
                            
                        <li><a href="" class="dropdown-item">Donate</a></li>
						<li><a href="" class="dropdown-item">Shelter Feeding Program</a></li>
						<li><a href="" class="dropdown-item">Shelter Cleaning Program</a></li>
						

                            

						</ul>
						
						
					</li>
						
						
					</li>
					<li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
					

				</ul>
			</div>

	</div>
</nav>
	
	<!-- End Navigation -->