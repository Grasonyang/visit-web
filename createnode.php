<?php
  include "connect.php";
  if ($_SESSION['call'] == 0) {
    if (!empty($_POST)) {
      if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `mail` LIKE '$_POST[email]'"))) {
        echo "<script>alert('this email had been used')</script>";
        echo "<script>history.go(-1)</script>";
      } else {
        if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE  `account` LIKE '$_POST[act]'"))) {
          echo "<script>alert('this username had been used')</script>";
          echo "<script>history.go(-1)</script>";
        } else {
          mysqli_query($db, "INSERT INTO `user`(`account`, `password`, `rank`, `candel`, `mail`) VALUES 
          ('$_POST[act]','$_POST[pwd]','1','1','$_POST[email]')");
          echo "<script>alert('success')</script>";
          header("Location:sign-in.php");
        }
      }
    } else {
      echo "<script>alert('please input')</script>";
      echo "<script>history.go(-1)</script>";
    }
  }
