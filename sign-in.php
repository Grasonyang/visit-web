<?php
include "connect.php";
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
  <link rel="stylesheet" href="Include/signin.css">
  <script src=""></script>
  <title>Sign in</title>
</head>

<body>
  <div class="blo"></div>
  <div id="title">
    <div style="height: 20vh;width: 25vw;">
      <img src="id.png" id="id" alt="">
    </div>
    <div style="text-align:center;">
      <span style="font-size:2vw;color:white;user-select:none;">Sign in to web</span>
    </div>
    <div class="blo"></div>
    <div style="height: 30vh;width: 25vw;">
      <form action="sign-innode.php?call=0" method="POST" class="for bro">
        <span style="width:auto;user-select:none;font-size:2vh;color:aliceblue;">Username</span><br><br>
        <input class="inser" type="text" required name="act"><br><br><br>
        <span style="width:auto;user-select:none;font-size:2vh;color:aliceblue;">Password</span>
        <button style="margin-left:10vw;background-color:#e0000000;border:0px;" type="button" onclick="location.href='forget.php'" class="spc">forget password?</button><br><br>
        <input class="inser" type="text" required name="pwd"><br><br><br>
        <input type="submit" value="Sign in" class="for send">
      </form>
    </div>
    <div style="height: auto;width: 20.5vw;padding-top:2vh;padding-bottom:2vh;" class="ano">
      <span style="margin-left:3vw;font-size:1.5vh;color: rgb(255, 245, 230);">New to Web? </span>
      <button class="spc" style="font-size:1.5vh;margin-left:2vw;background-color:#e0000000;border:0px;" onclick="location.href='create.php'">create an account</button>
    </div>
  </div>
</body>
s

</html>