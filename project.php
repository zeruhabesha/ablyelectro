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

	try{
		$stmt = $conn->prepare("SELECT * FROM project");
		$stmt->execute();
		$cat = $stmt->fetch();
		$catid = $cat['id'];
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>

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
                    <h1 id="about" style="color: #f4f4f4; margin-top: 0; padding-top: 54vh;"
                    class="title text-center">Project</h1>
						 </div> </div>
                        <div class="space"></div>
						<br/><br/>
						<div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM project");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       					echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a style='color:black;' href='project.php?id=".$row['slug']."'>".$row['name']."</a></h5>
                             <h5><a style='padding:5px;background-color:#708090;color:white;' href='projectview.php?id=".$row['slug']."'>VIEW</a></h5>
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
</body>



<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });




  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });
 $('#addproduct').click(function(e){
    e.preventDefault();
    getSubCategory();
  });
  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
     
 
      CKEDITOR.instances["editor2"].setData(response.description);
     getCategory();getSubCategory();
    }
  });
} 
</script>



</html>







