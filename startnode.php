<?php
include "connect.php";
if ($_SESSION['call'] == 0) {
  $user = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd`LIKE '$_SESSION[pd]'"));
  echo $user['howmay'];
} else if ($_SESSION['call'] == 1) {
  // $arr = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[pd]'"));
  $row = mysqli_query($db, "SELECT * FROM `plan` WHERE `page` LIKE '$_SESSION[page]' AND `projectpwd` LIKE '$_SESSION[pd]'");
  while ($arr = mysqli_fetch_array($row)) {
    echo json_encode($arr) . "((+))";
  }
} else if ($_SESSION['call'] == 2) {
  $a1 = $_POST['fpneed'];
  $a2 = $_POST['noww'];
  $id = $_POST['id'];
  $thi = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `plan` WHERE `id` LIKE '$id'"));
  $a3 = $thi['time2'];
  // echo ($a2 + $thi['time2'] - $thi['time1']);
  if (($a2 + $thi['time2'] - $thi['time1']) >= 24) {
    echo "1";
    $aaa = 24;
    mysqli_query($db, "UPDATE `plan` SET `time1`='$a2',`time2`='$aaa' WHERE `id` LIKE '$id'");
  } else {
    echo "2";
    $aaa = ($a2 + $thi['time2'] - $thi['time1']);
    mysqli_query($db, "UPDATE `plan` SET `time1`='$a2',`time2`='$aaa' WHERE `id` LIKE '$id'");
  }
} else if ($_SESSION['call'] == 3) {
  $row = mysqli_query($db, "SELECT * FROM `projectp` WHERE `account` LIKE '$_SESSION[name]'");
  while ($arr = mysqli_fetch_array($row)) {
    echo json_encode($arr) . "((+))";
  }
} else if ($_SESSION['call'] == 4) {
  $row = mysqli_query($db, "SELECT * FROM `plan` WHERE `id` LIKE '$_SESSION[name]'");
  while ($arr = mysqli_fetch_array($row)) {
    echo json_encode($arr) . "((+))";
  }
}
