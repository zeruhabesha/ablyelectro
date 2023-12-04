<html>
	<?php include 'includes/session.php'; ?>
<!--  -->
<head>
<link href="calendar.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="Ably Electrical Works and Impotrer">
<meta name="author" content="webThemez.com">
<title>Ably Electrical Works and Impotrer</title>
<link rel="shortcut icon" href="front/images/favicon.ico">
<link href="front/bootstrap/css/bootstrap.css" rel="stylesheet"> 
<link href="front/fonts/font-awesome/css/font-awesome.css" rel="stylesheet"> 
<link href="front/css/animations.css" rel="stylesheet"> 
<!-- <link href="front/css/style.css" rel="stylesheet">  -->
<link href="front/css/custom.css" rel="stylesheet">

</head>
<?php  //include 'includes/header.php'; ?>
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<?php include 'includes/navbar.php'; ?>


<section  class="section clearfix no-view secPadding" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-12" >
                        <div style="
background: linear-gradient(rgba(2, 2, 2, 0.5), rgba(0, 0, 0, 0.5)), url(http://localhost:8090/ablycom/images/banner11.jpg) fixed center center;
    margin-top: -40vh;
    height: 80vh;
    width: 300vh;
    margin-left: -60vh;
    background-size: cover;                        ">
                    <div 
                   style=" " class="section-title" >
                    <h1 id="contact" style="color: #f4f4f4; margin-top: 0; padding-top: 54vh;"
                    class="title text-center">Contact-Us</h1>
						 </div> </div>
                        <div class="space"></div>
                        <br/><br/>
						<div class="row">
							<div class="col-md-6">
	        	<div class="col-sm-9">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
        <!--	Banner -->
		
        <!--	Contact Information -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 bg-primary" style="background-color:#F13647;">
                        <div class="contact-info">
                            <!-- <h1 class="mb-4 mt-4 text-white">Contacts</h1> -->
							<h3>if you have any comment or If you want to get our products you can contact us here and we will get back to you as soon as possible. </h3>
                            <ul style="color:yellow;">
                                <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h3 class="text-white">Address</h3>
                                        <h4> <span style="color: white;" class="text-secondary">Semien Hotel on the building where Rift Valley University in located</span> </h4>
										</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h3 class="text-white">Call Us</h3>
                                         <h4><span style="color: white;"  class="d-table text-secondary">+251 (0) 911 464 023</span><br></h4>
										 <h4><span style="color: white;"  class="text-secondary">+251(0) 912 700 908</span></h4>
									</div>
                                </li>
                              <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                         <h3 class="text-white">Email Adderss</h3>
										 <h4><span style="color: white;"  class="d-table text-secondary">ablyelecmkt@gmail.com</span><br></h4>
										</div>
                                </li>
                            </ul><br>
                        </div>
                     


                       
					</div>
					<br>
					
                    
             
        <!--	Contact Inforamtion -->
        
        <!--	Map -->
   	<!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29921.88989279091!2d72.89392697798161!3d20.373147326844283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0d1d69db97345%3A0x8bc4433aecadadfd!2sROFEL%20ARTS%20%26%20COMMERCE%20COLLEGE!5e0!3m2!1sen!2sin!4v1585740130321!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		Map -->
		  
		
		
		<div class="col-lg-1"></div>
        <div class="col-md-12 col-lg-7">
						<div class="container">
                       
						<div class="row">
							<div class="col-md-12">
								<form class="w-100" action="contact_add.php" method="post">
									<div class="row">
										<div class="row mb-4">
											<div class="form-group col-lg-6">
												<input type="text"  name="name" class="form-control" placeholder="Your Name*">
											<br>
												<input type="text"  name="email" class="form-control" placeholder="Email Address*">
										<br>
												<input type="text"  name="phone" class="form-control" placeholder="Phone" maxlength="10">
											<br>
												<input type="text" name="subject"  class="form-control" placeholder="Subject">
											<br>
												<div class="form-group">
													<textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
												</div>
											</div>
										</div>
										<button type="submit" value="send message" name="send" class="btn btn-primary">Send Message</button>
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>
        <!--	Footer   start-->
	 </div>
	 <br>
	 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7880.308165849471!2d38.74513448282875!3d9.04970633207088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8fa5f9bdb7e5%3A0x9e990b728f7c2f6a!2zU2VtZW4gTWF6ZWdhamEgTWVza2VsZWduYSB8IOGIsOGInOGKlSDhiJvhi5jhjIvhjIMg4YiY4Yi14YmA4YiI4Yqb!5e0!3m2!1sen!2set!4v1658844216964!5m2!1sen!2set" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	 
	 <br>
	 
            </div>
        </div><br>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <!-- End Scroll To top --> 
   </section>  </div>

		 </div>		   
		  
	        	
	     
	     
	
  
     <?php include 'includes/footer.php'; ?>
</div>

<script type="text/javascript" src="front/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="front/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="front/plugins/modernizr.js"></script>
		<script type="text/javascript" src="front/plugins/isotope/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="front/plugins/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="front/plugins/jquery.appear.js"></script>
		<script type="text/javascript" src="front/js/custom.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>