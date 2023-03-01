<?php
	include 'includes/session.php';
	include 'includes/slugify.php';
	
 $conn = $pdo->open(); 
 
                        
						
	if(isset($_POST['edit1'])){
		
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		
		

	#$stmt1 = $conn->prepare("SELECT *, products.id AS prodid, products.quantity AS prodquant FROM products WHERE products.id=:id");
	
		
						  try{
							  
						$stmt1 = $conn->prepare("SELECT * FROM products WHERE id=:id");
                        $stmt1->execute(['id'=>$id]);
						
						foreach($stmt1 as $row){
		   $quantity1 = $row['quantity']; 
		   $quantity = $_POST['quantity'];
		   
$quantity2 = ($quantity1 - $quantity); 	
						}
				/*  		  */
						  
						  
			$stmt = $conn->prepare("UPDATE products SET  quantity=:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$quantity2, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}   	
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		
	}
	
	
	elseif  (isset($_POST['edit2'])){
		
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		
		

	#$stmt1 = $conn->prepare("SELECT *, products.id AS prodid, products.quantity AS prodquant FROM products WHERE products.id=:id");
	
		
						  try{
							  
						$stmt1 = $conn->prepare("SELECT * FROM products WHERE id=:id");
                        $stmt1->execute(['id'=>$id]);
						
						foreach($stmt1 as $row){
		   $quantity1 = $row['quantity']; 
		   $quantity = $_POST['quantity'];
		   
$quantity2 = ($quantity1 + $quantity); 	
						}
				/*  		  */
						  
						  
			$stmt = $conn->prepare("UPDATE products SET  quantity=:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$quantity2, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}   	
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	
	
	
	
	
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>