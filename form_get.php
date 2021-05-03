<?php
require_once "pdo.php";
//edited

$sql  = "SELECT * FROM realip WHERE ip_address =:ip_address";
$stmt = $pdo->prepare($sql);

$sql1 = "SELECT ipAddress from ip_location";
$stmt1 = $pdo->query($sql1);
$rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "INSERT INTO realip (ip_address) VALUES (:ip_address)";
$stmt2 = $pdo->prepare($sql2);
foreach ( $rows as $row ) {
  $stmt->execute(array(
   ':ip_address' => $row['ipAddress']
  )
  );
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row1===false){
      $stmt2->execute(array(
       ':ip_address' => $row['ipAddress']
      )
      );
    }
}
try{
 //$ip=$_GET['ip'];
 $statusCode='';
 $ipAddress='';
 $countryCode='';
 $countryName='';
 $regionName='';
 $zipCode='';
 $latitude='';
 $longitude='';
 $timeZone='';
 $apikey='495f2b51b9817892ffc540d769aa49317a3679875f5d4c4b077082349c3a7130';
 $url = 'http://api.ipinfodb.com/v3/ip-city/?key='.$apikey.'&format=json&ip='.$ip;
 $response = file_get_contents($url);
  $json_array=json_decode($response,true);


	function insert_into_database($statusCode,$statusMessage,$ipAddress,$countryCode,$countryName,$regionName,$cityName,$zipCode,$latitude,$longitude){
		require_once('db_config.php');
		if($statusCode=='OK'){
			$sql='insert into ip_location(statusCode,ipAddress,countryCode,countryName,regionName,zipCode,latitude,longitude,timeZone) value (?,?,?,?,?,?,?,?,?)';
			$stm=mysqli_prepare($conn,$sql);
			mysqli_stmt_bind_param($stm,"sssssssss",$statusCode,$ipAddress,$countryCode,$countryName,$regionName,$zipCode,$latitude,$longitude,$timeZone);
			mysqli_stmt_execute($stm);
		}
	}



 function display_array_recursive($json_rec){
		if($json_rec){
			foreach($json_rec as $key=> $value){
				if(is_array($value)){
					display_array_recursive($value);
				}else{
					//echo $key.'--'.$value.'<br>';

					if($key=='statusCode'){
						$statusCode=$value;
					}
					if($key=='statusMessage'){
						$statusMessage=$value;
					}
					if($key=='ipAddress'){
						$ipAddress=$value;

					}
					if($key=='countryCode'){
						$countryCode=$value;
					}
					if($key=='countryName'){
						$countryName=$value;
					}
					if($key=='regionName'){
						$regionName=$value;
					}
					if($key=='cityName'){
						$cityName=$value;
					}
					if($key=='zipCode'){
						$zipCode=$value;
					}
					if($key=='latitude'){
						$latitude=$value;
					}
					if($key=='longitude'){
						$longitude=$value;
						insert_into_database($statusCode,$statusMessage,$ipAddress,$countryCode,$countryName,$regionName,$cityName,$zipCode,$latitude,$longitude);
            //edited
            $_SESSION['ip'] = $ipAddress;


          }

				}

			}
		}

	}
  	display_array_recursive($json_array);



}catch(Exception $e){
    echo $e->getMessage();
}




?>
