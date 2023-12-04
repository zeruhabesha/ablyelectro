<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname , category.name AS catname FROM products 
	INNER JOIN category ON category.id=products.category_id
		WHERE products.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}


/*	 AND
INNER JOIN sub_catagory ON sub_catagory.sid=products.category_id
  , sub_catagory.name AS catnames */
 ?>