<?php
include "connect.php";
if ($_SESSION['call'] == 1) {
  $row = mysqli_query($db, "SELECT * FROM `user`");
  while ($arr = mysqli_fetch_array($row)) {
    $user = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `record` WHERE `account` LIKE '$arr[2]'
     AND `rank` LIKE '1' ORDER BY `record`.`time` DESC LIMIT 1"));
    if (!empty($user)) {
      if ($user['action'] == '登入') {
        $dat = date("Y/m/d h:i:s");
        mysqli_query($db, "INSERT INTO `record`(`account`, `time`, `action`,`rank`) VALUES 
        ('$user[account]','$dat','登出','1')");
      }
    }
  }
}
