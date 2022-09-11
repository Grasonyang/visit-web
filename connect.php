<?php
session_start();
$db = mysqli_connect("127.0.0.1", "admin", "1234", "race");
foreach ($_GET as $key => $value) {
  $_SESSION[$key] = $value;
}
