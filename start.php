<?php
include "connect.php";
if ($_SESSION['pd'] == 0) {
} else if ($_SESSION['pd'] == 1) {
  if (!empty($_POST)) {
    $s = "ABCDEFGHJIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $aa = $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)] . "-" . $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)] . "-" . $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)];
    while (1) {
      if (mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$aa'"))) {
        $aa = $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)] . "-" . $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)] . "-" . $s[rand(0, 62)] . $s[rand(0, 62)] . $s[rand(0, 62)];
      } else {
        break;
      }
    }
    $dat = date("Y/m/d h:i:s");
    mysqli_query($db, "INSERT INTO `record`(`account`, `time`, `action`, `rank`) VALUES 
    ('$_SESSION[call]','$dat','新增專案','2')");
    mysqli_query($db, "INSERT INTO `projectp`(`account`, `projectname`,`projectpwd`,`howmay`) VALUES ('$_SESSION[call]','$_POST[name]','$aa','1')");
    // mysqli_query($db, "INSERT INTO `plan`(`projectpwd`, `date`) VALUES ('$aa','$_POST[date]')");
    $call = $_SESSION['call'];
    header("Location:start.php?call=$call&pd=$aa&page=0");
  }
} else if ($_SESSION['pd'] == 2) {
  $at = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_POST[code]'"));
  if ($at) {
    header("Location:start.php?call=$_SESSION[call]&pd=$_POST[code]&page=0");
  } else {
    echo "<script>
      if(confirm('this code is wrong')){
        location.href=\"start.php?call=$_SESSION[call]&pd=0&page=-1\";
      }
    </script>";
    // header("Location:start.php?call=$_GET[call]&pd=0&page=-1");
  }
} else if ($_SESSION['pd'] == 3) {
  $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[call]'"));
  $a = $arr['howmay'] + 1;
  mysqli_query($db, "UPDATE `projectp` SET `howmay`='$a' WHERE `projectpwd`LIKE'$_SESSION[call]'");
  $aa = $a - 1;
  header("Location:start.php?call=$arr[account]&pd=$arr[projectpwd]&page=$aa");
} else if ($_SESSION['pd'] == 4) {
  mysqli_query($db, "INSERT INTO `plan`(`projectpwd`, `name`, `intro`, `time1`, `time2`, `note`,`page`) VALUES 
  ('$_SESSION[call]','$_POST[name]','$_POST[introduce]','$_POST[time1]','$_POST[time2]','$_POST[note]','$_SESSION[page]')");
  $user = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[call]'"));
  header("Location:start.php?call=$user[account]&pd=$_SESSION[call]&page=$_SESSION[page]");
} else if ($_SESSION['pd'] == 5) {
  if ($_SESSION['page'] == 0) {
    $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[call]'"));
    $noth = $_SESSION['page'];
    $adm = $arr['account'];
    // echo $adm;
    header("Location:start.php?call=$adm&pd=$_SESSION[call]&page=$noth");
  } else {
    $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[call]'"));
    $noth = $_SESSION['page'] - 1;
    $adm = $arr['account'];
    // echo $adm;
    header("Location:start.php?call=$adm&pd=$_SESSION[call]&page=$noth");
  }
} else if ($_SESSION['pd'] == 6) {
  $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `projectp` WHERE `projectpwd` LIKE '$_SESSION[call]'"));
  if ($arr['howmay'] == $_SESSION['page'] + 1) {
    $noth = $_SESSION['page'];
    $adm = $arr['account'];
    header("Location:start.php?call=$adm&pd=$_SESSION[call]&page=$noth");
  } else {
    $noth = $_SESSION['page'] + 1;
    $adm = $arr['account'];
    header("Location:start.php?call=$adm&pd=$_SESSION[call]&page=$noth");
  }
} else if ($_SESSION['pd'] == 7) {
  $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `plan` WHERE `id` LIKE '$_SESSION[call]'"));
  mysqli_query($db, "DELETE FROM `plan` WHERE `id` LIKE '$_SESSION[call]'");
  $page = $_SESSION['page'];
  header("Location:start.php?call=$page&pd=$arr[1]&page=$arr[7]");
} else if ($_SESSION['pd'] == 8) {
  $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `plan` WHERE `id` LIKE '$_SESSION[page]'"));
  mysqli_query($db, "UPDATE `plan` SET `name`='$_POST[name]',`intro`='$_POST[introduce]',`time1`='$_POST[time1]',`time2`='$_POST[time2]',`note`='$_POST[note]' WHERE `id`LIKE'$_SESSION[page]'");
  $aa = $_SESSION['call'];
  // echo $arr[1];
  header("Location:start.php?call=$aa&pd=$arr[1]&page=$arr[7]");
} else if ($_SESSION['pd'] == 9) {
} else if ($_SESSION['pd'] == 10) {
}

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
  <link rel="stylesheet" href="Include/start.css">
  <script src="Include/st.js"></script>
  <title>Join</title>
</head>

<body id="sss">
  <div id="mai" style="height:100%;width:100%;position:relative">
    <!-- <div class="blo"></div> -->
    <div id="bod">
      <div style="display:flex;margin-left:20vw;margin-right:20vw;width:60vw;height:auto" id="upbut">
        <div id="mainn">
          <img src="id.png" style="height:7vh;width:5vh;margin-top:3vh;" alt="">
        </div>
        <div style="width:5vw"></div>
        <div style="width:5vw">
          <div style="margin-top: 7vh;width:auto">
            <button class="itm" onclick="cha(1)"><span style="font-size:20px;">Product</span></button>
          </div>
        </div>
        <div style="width:3.5vw">
          <div style="margin-top: 7vh;width:auto">
            <button class="itm" onclick="cha(2)"><span style="font-size:20px;">Add</span></button>
          </div>
        </div>
        <div style="width:5vw">
          <div style="margin-top: 7vh;width:auto">
            <button class="itm" onclick="cha(3)"><span style="font-size:20px;">Use</span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="main" id="pro" style="margin-left:40vw;margin-right:40vw;width:20vw;height:auto;text-align:center;">
      <table id="projec" border="1" style="text-align:center">
        <tr>
          <td style="font-weight:bolder;width:60px;">No.</td>
          <td style="font-weight:bolder;width:120px;">Name</td>
          <td style="font-weight:bolder;width:80px;">days</td>
        </tr>
      </table>
    </div>
    <!-- ADD -->
    <div class="main" id="add" style="margin-left:20vw;margin-right:20vw;width:60vw;height:auto;">
      <form action="start.php?call=<?php echo $_SESSION['call'] ?>&pd=1&page=-1" method="POST">
        <div style="height:auto;width:auto;padding:20px 50px;">
          <span style="font-size:25px;color:rgb(255, 248, 233);">Project name</span><br><br>
          <span style="font-size:25px;color:rgb(255, 0, 140);">→</span><input required type="text" name="name" class="dat">
        </div>
        <div style="height:auto;width:auto;padding:20px 50px;">
          <span style="font-size:25px;color:rgb(255, 248, 233);">Input the date</span><br><br>
          <span style="font-size:25px;color:rgb(255, 0, 140);">→</span><input required type="date" name="date" class="dat">
        </div>
        <div style="height:auto;width:auto;padding:20px 50px;">
          <button class="act" onclick="non()">Quit</button>
          <button class="act" type="submit">Continue</button>
        </div>
      </form>
    </div>
    <div class="main" id="searchcode" style="margin-left:20vw;margin-right:20vw;width:60vw;height:auto;">
    </div>
    <!-- USE -->
  </div>
  <div class="popup-box transform-out" id="newplan">
    <button class="close-btn" type="button">X</button>
    <!-- <a   href="#"></a> -->
    <form action="start.php?call=<?php echo $_SESSION['pd'] ?>&pd=4&page=<?php echo $_SESSION['page'] ?>" method="POST" onsubmit="return dateif()">
      <span class="til">Name</span><span class="middd">:</span><input class="ip" type="text" name="name"><br><br><br>
      <span class="til">Introduce</span><span class="middd">:</span><input class="ip" type="text" name="introduce"><br><br><br>
      <span class="til">Time</span><span class="middd">:</span>
      <select name="time1" class="ip" id="time1">
        <option value="0">00:00</option>
        <option value="1">01:00</option>
        <option value="2">02:00</option>
        <option value="3">03:00</option>
        <option value="4">04:00</option>
        <option value="5">05:00</option>
        <option value="6">06:00</option>
        <option value="7">07:00</option>
        <option value="8">08:00</option>
        <option value="9">09:00</option>
        <option value="10">10:00</option>
        <option value="11">11:00</option>
        <option value="12">12:00</option>
        <option value="13">13:00</option>
        <option value="14">14:00</option>
        <option value="15">15:00</option>
        <option value="16">16:00</option>
        <option value="17">17:00</option>
        <option value="18">18:00</option>
        <option value="19">19:00</option>
        <option value="20">20:00</option>
        <option value="21">21:00</option>
        <option value="22">22:00</option>
        <option value="23">23:00</option>
      </select>
      <span class="middd">~</span>
      <select name="time2" class="ip" id="time2">
        <option value="1">01:00</option>
        <option value="2">02:00</option>
        <option value="3">03:00</option>
        <option value="4">04:00</option>
        <option value="5">05:00</option>
        <option value="6">06:00</option>
        <option value="7">07:00</option>
        <option value="8">08:00</option>
        <option value="9">09:00</option>
        <option value="10">10:00</option>
        <option value="11">11:00</option>
        <option value="12">12:00</option>
        <option value="13">13:00</option>
        <option value="14">14:00</option>
        <option value="15">15:00</option>
        <option value="16">16:00</option>
        <option value="17">17:00</option>
        <option value="18">18:00</option>
        <option value="19">19:00</option>
        <option value="20">20:00</option>
        <option value="21">21:00</option>
        <option value="22">22:00</option>
        <option value="23">23:00</option>
        <option value="23">24:00</option>
      </select><br><br><br>
      <span class="til">Note</span><span class="middd">:</span><input class="ip" type="text" name="note"><br><br><br>
      <input type="submit" class="sed">
    </form>
  </div>
  <div class="popup-box transform-out" id="newpage">
    <!-- <a class="close-btn" type="button" href="#">x</a> -->
    <button class="close-btn" type="button">X</button>
    <h1>是否新增</h1>
    <input type="button" onclick="location.href='start.php?call=<?php echo $_SESSION['pd'] ?>&pd=3&page=0'" value="Yes" class="sed"><input type="button" onclick='$(".popup-box").hide();' value="No" class="sed">
  </div>
  <div class="mapp">

  </div>
</body>
<script>
  $(".popup-box").hide();
  $(".map").hide();
  $(".main").hide();
  $(".mapp").dialog({
    autoOpen: false,

  });
  let idd = "";
  // if ($(".timeform").is(":hidden")) {
  //   alert(1);
  // } else {
  //   alert(0);
  // }
  // $.when($("#sss").hide()).then(function() {
  //   alert(1);
  //   $(".map").hide();
  // });
  if (idd == 0 || idd == 1 || idd == 3 || idd == 4 || idd == 5 || idd == 6 || idd == 7 || idd == 8) {
    $(".main:eq(0)").hide();
    $("#pro").show();

  } else {

    aaa();
    // if (aa == "") {

    // } else {
    //   $("#use" + aa).show();
    // }
  }
  let firstplace = null;
  let fpneed = null;
  code();
  planadd();
  project();

  $(".plann").click(function() {
    // alert($(this).attr("id"));
    $("#sss").append(`
    <div class="popup-box transform-out" id="newedde">
      <!-- <a class="close-btn" type="button" href="#">x</a> -->
      <button class="close-btn" type="button">X</button>
      <input type="button" onclick="anewww('${$(this).attr("id")}')" value="Edit" class="sed">
      <input type="button" onclick="location.href='start.php?call=${$(this).attr("id")}&pd=7&page=<?php echo $_SESSION['call'] ?>'" value="Del" class="sed">
    </div>
    `);
    $("#newedde").show();
    $(".close-btn").click(function() {
      $(".popup-box").hide();
    });
  });

  $(".close-btn").click(function() {
    $(".popup-box").hide();
  });

  function dateif() {
    if ($("#time1").val() < $("#time2").val()) {
      return true;
    } else {
      alert("時間錯誤");
      return false;
    }
  }

  function aaa() {
    alert(1);
    $(".map").show();
    let aa = "<?php echo $_SESSION['page'] ?>";
    if (aa == "") {

    } else {
      $("#use" + aa).show();
      // $(".map").show();
      // $(".map").show();
    }

  }

  function cha(e) {
    e = e - 1;
    if (e == 2) {
      let aa = "<?php echo $_SESSION['pd'] ?>";
      if (aa != 0 && aa != 1 && aa != 3 && aa != 4 && aa != 5 && aa != 6 && aa != 7 && aa != 8) {
        $(".main").hide();
        let aaa = "<?php echo $_SESSION['page'] ?>";
        $("#use" + aaa).show();
        $(".map").show();
      } else {
        $(".main").hide();
        $("#searchcode").show();
        $(".map").hide();
      }
    } else {
      $(".main").hide();
      $(".main:eq(" + e + ")").show();
      $(".map").hide();
    }
  }

  function non() {
    $(".dat").val("");
  }

  // function close(aaa) {
  //   if (aaa == 0) {
  //     $("#newplan").show();
  //   } else {
  //     $("#newpage").show();
  //   }
  // }


  function code() {
    let aa = "<?php echo $_SESSION['pd'] ?>";
    // console.log(aa);
    if (aa != "0" && aa != "1" && aa != "3" && aa != "4" && aa != "5" && aa != "6" && aa != "7" && aa != "8") {
      $.post({
        async: false,
        url: "startnode.php?call=0&pd=<?php echo $_SESSION['pd'] ?>",
        success: function(e) {
          // console.log(e);
          let thispage = <?php echo $_SESSION['page'] ?>;
          let thiscall = "<?php echo $_SESSION['call'] ?>";
          let thispd = "<?php echo $_SESSION['pd'] ?>";
          for (let i = 0; i < e; i++) {
            $("#mai").append(`
              <div class="main timeform" id="use${i}" style="margin-left:20vw;margin-right:20vw;width:60vw;height:auto;">
                <table style="border-collapse: collapse;width:100%;display:block;overflow-x: hidden;white-space: nowrap;" border="1" class="thista">
                  <tr>
                    <td style="height:40px;width:10vw"><span class="form" style="font-weight: bolder;font-size: 2vh;">Time</span></td>
                    <td style="height:40px;width:50vw">
                      <span class="form" style="font-weight: bolder;font-size: 2vh;">workform</span>
                      <button class="work" style="margin-left:33vw;" onclick="$('.popup-box').hide(),$('#newplan').show()">new plan</button>
                      <button class="work" onclick="$('.popup-box').hide(),$('#newpage').show()">new page</button>
                      <button class="work" onclick="$('.mapp').dialog('open')">add plan</button>
                      <button class="work" onclick="location.href='start.php?call=${thispd}&pd=5&page=${thispage}'"><</button>
                      <button class="work" onclick="location.href='start.php?call=${thispd}&pd=6&page=${thispage}'">></button>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">0~2</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}0"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}1"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">2~4</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}2"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}3"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">4~6</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}4"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}5"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">6~8</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}6"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}7"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">8~10</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}8"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}9"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">10~12</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}10"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}11"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">12~14</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}12"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}13"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">14~16</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}14"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}15"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">16~18</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}16"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}17"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">18~20</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}18"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}19"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">20~22</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}20"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}21"></div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:10vw;"><span class="timel" style="font-weight: bold;font-size: 1.9vh;">22~24</span></td>
                    <td style="padding:0;">
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}22"></div>
                      <div style="height:30px;width:50vw" ondrop="drop(event)" ondragover="over(event)" class="a${thispage}23"></div>
                    </td>
                  </tr>
                </table>
              </div>
            `);
          }
          $(".main").hide();
          let nowpage = <?php echo $_SESSION['page'] ?>;
          $("#use" + nowpage).show();
          $(".map").show();
        },
      });
    } else {
      $("#searchcode").append(`
        <form action="start.php?call=<?php echo $_SESSION['call'] ?>&pd=2&page=-1" method="POST">
          <div style="height:auto;width:auto;padding:20px 50px;">
            <span style="font-size:25px;color:rgb(255, 248, 233);">Project verification code</span><br><br>
            <span style="font-size:25px;color:rgb(255, 0, 140);">→</span><input required type="text" name="code" class="dat">
          </div>
          <div style="height:auto;width:auto;padding:20px 50px;">
            <button class="act" type="submit">Continue</button>
          </div>
        </form>
      `);
    }
  }

  function planadd() {
    $(".plann").remove();
    $.post({
      async: false,
      url: "startnode.php?call=1&pd=<?php echo $_SESSION['pd'] ?>&page=<?php echo $_SESSION['page'] ?>",
      success: function(e) {
        console.log(e);
        list = e.split("((+))");
        list.pop();
        for (let i = 0; i < list.length; i++) {
          arr = JSON.parse(list[i]);
          let leftpx = i * 80;
          let hi = (arr['time2'] - arr['time1']) * 30 + (arr['time2'] - arr['time1']) / 2 - 1;
          let pagee = "<?php echo $_SESSION['page'] ?>";
          // console.log(hi);
          $(".a" + pagee + arr['time1']).append(`
            <div style="width:60px;height:${hi}px;margin-left:${leftpx}px;overflow:hidden" id="${arr[0]}" draggable="true" ondragstart="start(event)" class="plann">
              Name:<br>${arr[2]}
            </div>
          `);
        }
      },
    });
  }

  function start(e) {
    firstplace = e.target.className;
    fpneed = $("." + firstplace).parent().attr("class");
    let dep = "a" + "<?php echo $_SESSION['page'] ?>";
    fpneed = fpneed.replace(dep, '');
    firstplace = e.target.id;

    console.log(firstplace);
  }

  function over(e) {
    e.preventDefault();
  }

  function drop(e) {
    // console.log(e.target.className);
    console.log(e.target.id);
    if (e.target.className != "plann") {
      noww = e.target.className;
      let dep = "a" + "<?php echo $_SESSION['page'] ?>";
      noww = noww.replace(dep, '');
      // console.log(noww);
      $.post({
        async: false,
        url: "startnode.php?call=2&pd=<?php echo $_SESSION['pd'] ?>&page=<?php echo $_SESSION['page'] ?>",
        data: {
          fpneed: fpneed,
          noww: noww,
          id: firstplace,
        },
        success: function(e) {
          // alert(e);
          // console.log(e);
          code();
          planadd();
        },
      });
    }

  }

  function project() {
    $.post({
      async: false,
      url: "startnode.php?call=3&name=<?php echo $_SESSION['call'] ?>",
      success: function(e) {
        // alert(e);
        let list = e.split("((+))");
        list.pop();
        for (let i = 0; i < list.length; i++) {
          arr = JSON.parse(list[i]);
          $("#projec").append(`
            <tr>
              <td>${i+1}</td>
              <td>${arr['projectname']}</td>
              <td>${arr['howmay']}</td>
            </tr>
          `);
        }
      },
    });
  }

  function anewww(e1) {
    $.post({
      async: false,
      url: "startnode.php?call=4&name=" + e1,
      success: function(e) {
        // alert(e);
        let list = e.split("((+))");
        list.pop();
        for (let i = 0; i < list.length; i++) {
          arr = JSON.parse(list[i]);
          $("#sss").append(`
            <div class="popup-box transform-out" id="editplan">
              <button class="close-btn" type="button">X</button>
              <!-- <a   href="#"></a> -->
              <form action="start.php?call=<?php echo $_SESSION['call'] ?>&pd=8&page=${arr[0]}" method="POST" onsubmit="return dateif()">
                <span class="til">Name</span><span class="middd">:</span><input class="ip" type="text" value="${arr['name']}" name="name"><br><br><br>
                <span class="til">Introduce</span><span class="middd">:</span><input class="ip" type="text" value="${arr['intro']}" name="introduce"><br><br><br>
                <span class="til">Time</span><span class="middd">:</span>
                <select name="time1" class="ip" value="${arr['time1']}" id="etime1">
                  <option value="0">00:00</option>
                  <option value="1">01:00</option>
                  <option value="2">02:00</option>
                  <option value="3">03:00</option>
                  <option value="4">04:00</option>
                  <option value="5">05:00</option>
                  <option value="6">06:00</option>
                  <option value="7">07:00</option>
                  <option value="8">08:00</option>
                  <option value="9">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                  <option value="18">18:00</option>
                  <option value="19">19:00</option>
                  <option value="20">20:00</option>
                  <option value="21">21:00</option>
                  <option value="22">22:00</option>
                  <option value="23">23:00</option>
                </select>
                <span class="middd">~</span>
                <select name="time2" class="ip" value="${arr['time2']}" id="etime2">
                  <option value="1">01:00</option>
                  <option value="2">02:00</option>
                  <option value="3">03:00</option>
                  <option value="4">04:00</option>
                  <option value="5">05:00</option>
                  <option value="6">06:00</option>
                  <option value="7">07:00</option>
                  <option value="8">08:00</option>
                  <option value="9">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                  <option value="18">18:00</option>
                  <option value="19">19:00</option>
                  <option value="20">20:00</option>
                  <option value="21">21:00</option>
                  <option value="22">22:00</option>
                  <option value="23">23:00</option>
                  <option value="23">24:00</option>
                </select><br><br><br>
                <span class="til">Note</span><span class="middd">:</span><input class="ip" type="text" value="${arr['note']}" name="note"><br><br><br>
                <input type="submit" class="sed">
              </form>
            </div>
          `);
          let aa = arr[4];
          $("#etime1")[0].selectedIndex = aa;
          let aax = arr[5] - 1;
          $("#etime2")[0].selectedIndex = aax;
          $(".close-btn").click(function() {
            $(".popup-box").hide();
          });
        }
      },
    });
  }
</script>

</html>