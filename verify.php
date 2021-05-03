<?php
require_once "C:/xampp/htdocs/INTERN/DB/pdo.php";
if(isset($_GET['vkey'])){
	$vkey = $_GET['vkey'];
	$default = 0;
	$sql = "SELECT verified,vkey  FROM reservation WHERE verified = :verified AND vkey = :vkey LIMIT 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
	 ':verified'=>$default,
	 ':vkey'=> $vkey
	)
	);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if(count($rows)==1){
		$default = 1;
		$sql1 = "UPDATE reservation SET verified = :verified WHERE vkey =:vkey LIMIT 1";
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->execute(array(
		 ':verified'=>$default,
		 ':vkey'=> $vkey
	)
	);
	echo "congrats your table has been successfully booked";
	echo "wait till you are redirected...";
	header('location:index.php');
	}
	
}else{
	die('korosu');
}
?>
<html>
<head>
</head>
<body>
</body>
</html>