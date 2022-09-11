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
  <link rel="stylesheet" href="Include/Main.css">
  <script src="Include/all.js"></script>
  <title>MAIN</title>
</head>
<style>
  .logg:hover {
    color: #33ccff;
    border-color: #33ccff;
  }
</style>

<body>
  <div class="inl" id="left">
    <div id="up">
      <img src="Untitled.png" style="height:250px;width:250px;" alt="">
    </div>
    <div id="element">
      <ul>
        <li>
          <button class="but" style="font-size:4vh;">Start</button>
        </li>
        <img src="Include/img/nav-item-highlight.png">
        <br><br>
        <li>
          <button class="but" style="font-size:4vh;">Manegement</button>
        </li>
        <img src="Include/img/nav-item-highlight.png">
        <br><br>
        <li>
          <button class="but" style="font-size:4vh;">Search</button>
        </li>
        <img src="Include/img/nav-item-highlight.png">
        <br><br>
        <li>
          <button class="but" style="font-size:4vh;">About us</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="inl" id="right">
    <div id="body">
      <img style="margin-top:30vh;user-select:none;" src="redgrg.png" alt="">
      <div id="title">
        <span style="user-select:none;font-weight:bold;font-size:5vh;color:aliceblue;">Welcome to our web</span><br><br>
        <span style="margin-left:2vw;user-select:none;font-weight:100;font-size:2vh;color:aliceblue;">Start to create your plan.</span><br><br>
        <button onclick="location.href='sign-in.php'" class="logg" style="margin-top:5vh;margin-left:5vw;height:5vh;width:10vh;background-color: rgba(255, 255, 255, 0);border-radius:20px;font-size:1.5vh;color:white">Sign in</button>
        <div>
          <img src="erdgreg.png" alt="">
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  $("li").click(function() {

  });
</script>

</html>