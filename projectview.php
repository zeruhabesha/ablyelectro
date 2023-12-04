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

</head><?php
	$conn = $pdo->open();

	$slug = $_GET['id'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, project.name AS prodname, project.id AS prodid FROM project WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view


?>

<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
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
                    class="title text-center">Project Detail</h1>
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
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ablycom/project.php?id=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-2">
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
</body>
</html>