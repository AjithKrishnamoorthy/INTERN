<?php
require_once 'pdo.php';
/*
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['check-in']) ) {
  if(strlen($_POST['name'])<1 || strlen($_POST['email'])<1 || strlen($_POST['phone']) <1 || strlen($_POST['check-in']) <1 ){
    $_SESSION['error'] = "All values are required";
    header("Location: reservation.php");
        return;
  }else{ */
  //  $year = htmlentities($_POST['year']);
    //$mileage = htmlentities($_POST['mileage']);
    //if(is_numeric($year) && is_numeric($mileage)){
      $sql = "INSERT INTO reservation (name, email, phone, checkIn, time ,type) VALUES (:name, :email, :phone, :checkIn, :time ,:type) ";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':name' => $_POST['name'],
          ':email' => $_POST['email'],
          ':phone' => $_POST['phone'],
          ':checkin' => $_POST['check-in'],
          ':time' => $_POST['time'],
          ':type' => $_POST['type']));

          $_SESSION['success'] = "Record added";
          header("Location: index.php");
          return;

    //}
    /*else{

      $_SESSION['error'] = "Mileage and year must be numeric";
      header("Location: reservation.php");
          return;
    }
    */
  //}

 ?>
