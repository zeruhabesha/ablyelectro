<html>
	<?php include 'includes/session.php'; ?>
<!--  -->
<head>
<link href="calendar.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="Ably Electrical Works and Impotrer">
<!-- <meta name="author" content="webThemez.com"> -->
<title>Ably Electrical Works and Impotrer</title>
<link rel="shortcut icon" href="front/images/favicon.ico">
<link href="front/bootstrap/css/bootstrap.css" rel="stylesheet"> 
<link href="front/fonts/font-awesome/css/font-awesome.css" rel="stylesheet"> 
<link href="front/css/animations.css" rel="stylesheet"> 
<!-- <link href="front/css/style.css" rel="stylesheet">  -->
<link href="front/css/custom.css" rel="stylesheet">

</head>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
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
                    <h1 id="about" style="color: #f4f4f4; margin-top: 0; padding-top: 54vh;"
                    class="title text-center">Catagory</h1>
						 </div> </div>
                        <div class="space"></div>
						<br/><br/>
						<div class="row">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"><?php echo $cat['name']; ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>Birr ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		 <?php include 'includes/sidebar.php'; ?> 
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
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
