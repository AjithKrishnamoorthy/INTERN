<?php
require_once 'pdo.php';

date_default_timezone_set('Asia/Kolkata');
$sql = "SELECT * FROM ip_location WHERE ipAddress = :ip AND date_column BETWEEN :dat AND :dat1";
$stmt = $pdo->prepare($sql);
$newTime = strtotime('-2 minutes');
$checking = date("Y-m-d H:i:s",$newTime);
$current = date("Y-m-d H:i:s");

$stmt->execute(array(
 ':ip' => $_SESSION['ip'],
 ':dat'=> $checking,
 ':dat1'=> $current
)
);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table border="1">
       <?php
       if(count($rows)>=10){
			die("You have been blocked temporarily for unusual number of requests");
		}
       
        ?>
     </table>
   </body>
 </html>
