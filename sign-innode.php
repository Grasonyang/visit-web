<?php
include "connect.php";
if ($_SESSION['call'] == 0) {
  if (!empty($_POST)) {
    if ($user = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `user` WHERE `account` LIKE '$_POST[act]' AND `password` LIKE '$_POST[pwd]'"))) {
      $dat = date("Y/m/d h:i:s");
      mysqli_query($db, "INSERT INTO `record`(`account`, `time`, `action`,`rank`) VALUES 
      ('$_POST[act]','$dat','登入','1')");
      $aa = $_POST['act'];
      header("Location:start.php?call=$aa&pd=0&page=-1");
    } else {
      echo "<script>alert('username or password is wrong')</script>";
      echo "<script>history.go(-1)</script>";
    }
  }
}
