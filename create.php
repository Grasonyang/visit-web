<?php
include "connect.php";
// if ($_SESSION['call'] == 1) {
//   if (!empty($_POST)) {
//     if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `mail` LIKE '$_POST[email]'"))) {
//       echo "<script>alert('this email had been used')</script>";
//       echo "<script>history.go(-1)</script>";
//     } else {
//       if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `mail` LIKE '$_POST[email]' AND `account` LIKE '$_POST[act]'"))) {
//         echo "<script>alert('this account had been used')</script>";
//         echo "<script>history.go(-1)</script>";
//       } else {
//         echo "<script>alert('success')</script>";
//       }
//     }
//   } else {
//     echo "<script>alert('please input')</script>";
//     echo "<script>history.go(-1)</script>";
//   }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="Include/jquery-3.5.1.min.js"></script>
  <script src="Include/jquery-ui.js"></script>
  <link rel="stylesheet" href="Include/jquery-ui.min.css">
  <link rel="stylesheet" href="Include/create.css">
  <script src="Include/all.js"></script>
  <title>Join</title>
</head>

<body>
  <div style="height:100%;width:100%;position:relative">
    <div class="blo"></div>
    <div style="display:inline-block;margin-left:20vw;margin-right:20vw;width:60vw">
      <div style="float: left;" id="mainn">
        <img src="id.png" style="height:7vh;width:5vh" alt="">
      </div>
      <div style="text-align:right;">
        <div class="th"><span style="color: rgba(73, 0, 146, 0.937);font-size:1.5vh;margin-right:2vw;">Already have an account?</span><a href="sign-in.php" style="font-size:2vh;color: rgba(120, 0, 241, 0.937);text-decoration:none;">Sign in→</a></div>
      </div>
    </div>
    <div class="blo"></div>
    <div style="height:auto;width:40vw;padding:10px 20px" class="body">
      <div style="margin-bottom:10px;">
        <span style="color: rgba(154, 154, 154, 0.875);">Welcome to Web!</span>
      </div>
      <div style="margin-bottom:30px;">
        <span style="color: rgba(154, 154, 154, 0.875);">Let’s begin the adventure</span>
      </div>
      <div>
        <form action="createnode.php?call=0" method="post">
          <div style="margin-bottom:10px;">
            <span style="color: #00cfc8;font-weight:bold;font-size:18px;">Enter your email</span>
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: rgba(255, 24, 205, 0.875);">→</span>
            <input type="email" required name="email" id="email">
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: #00cfc8;font-weight:bold;font-size:18px;">Create a password</span>
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: rgba(255, 24, 205, 0.875);">→</span>
            <input type="text" required name="pwd" id="pwd">
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: #00cfc8;font-weight:bold;font-size:18px;">Enter a username</span>
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: rgba(255, 24, 205, 0.875);">→</span>
            <input type="text" required name="act" id="name">
          </div>
          <div style="margin-bottom:10px;">
            <span style="color: #00cfc8;font-weight:bold;font-size:18px;">Press "continue" to sign up</span>
          </div><br>
          <div style="margin-bottom:10px;">
            <button type="submit" id="con">continue</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<script>
  $("#mainn").click(function() {
    location.href = "index.php";
  });
</script>

</html>