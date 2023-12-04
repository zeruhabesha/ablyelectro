<?php include 'includes/session.php'; ?>
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
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

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
                    class="title text-center">Product</h1>
						 </div> </div>
                        <div class="space"></div>
						<br/><br/>
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $product['photo']; ?>">
		            		<br><br>
		            		
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>
		            		<h3><b>Birr <?php echo number_format($product['price'], 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
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