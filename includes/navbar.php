<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<!-- header-left start --> 
						<div class="header-left">

						 

							<!-- name-and-slogan -->
							<div class="logo-section smooth-scroll">
								<div class="brand">
                  <!-- <a href="#banner"> -->
                <img src="images/logo111.png" style="width:22vh;height:auto;" alt="">
                  <!-- <b>ABLY</b> Electrical works and Impoter</a> -->
                </div>								
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-10">

						<!-- header-right start --> 
						<div class="header-right">

							<!-- main-navigation start --> 
							<div class="main-navigation animated">

								<!-- navbar start --> 
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right navli">
                      <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'><b class='AAA'>".$row['name']."</b></a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
      
      </li>
      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
           
					 <li><a href='project.php'><b class='AAA'>Project</b></a></li>

			 <li><a href='training.php'><b class='AAA'>Training</b></a></li>
            </ul>
          </li>

        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="about.php">About-Us</a></li>
        <li><a href="contact.php">Contact-Us</a></li>
											</ul>
										</div>

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>



