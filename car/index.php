<?php
include 'db2.php';
session_start();
if (isset($_SESSION['login_admin'])) {
  header("location:dashboard.php");
}
if (isset($_POST["submit"])) {
  $usrname = mysqli_real_escape_string($con, $_POST['usrnm']);
  $epassword = mysqli_real_escape_string($con, $_POST['pswd']);

  $sql = mysqli_query($con, "SELECT * FROM role_db WHERE email='$usrname' AND password='$epassword'");
  if(mysqli_num_rows($sql)==1){
  while ($row = mysqli_fetch_assoc($sql)) {

    if ($row['role'] == 'admin') {
      $_SESSION['login_admin'] = $row['role_id'];
      header("location: dashboard.php");
    } elseif ($row['role'] == 'worker') {
      $_SESSION['login_admin'] = $row['role_id'];
      header("location: worker_dashboard.php");
    } elseif ($row['role'] == 'user') {
      $_SESSION['login_admin'] = $row['role_id'];
      header("location: user_dashboard.php");
    } else {
      echo "<script>alert('Username and password are incorrect')</script>";
      echo "<script>window.location='index.php'</script>";
    }
  }
}
else{  echo "<script>alert('Invalid User')</script>";}
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <link href="stylesheet.css" rel="stylesheet">
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <link rel="icon" href="car.png" type="image/png">
  <title>Login</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

    body {
      background: hsl(210, 88%, 50%);
      font-family: "Raleway", Helvetica, sans-serif;
    }
  </style>
</head>

<body>
  <header>
    <section class="title-text">
      <h1 id="title" class="title">Drive it - Car rental System</h1>
      <p id="description" class="title-text"><em>Your destination is our mission</em></p>
    </section>
  </header>

  <main>

    <form method="POST" name="myform" onsubmit="return validate();">
      <div id="survey-form">
        <section id="survey-fields">

          <label for="name" id="name-label">* Email:</label>
          <input id="name" type="text" placeholder="Enter your email" name="usrnm">
          <label for="Email" id="password-label">* Password:</label>
          <input id="email" type="password" placeholder="Enter your password" name="pswd">
        </section>
      </div>
      <input type="reset" value="Clear"><input type="submit" value="Submit" name="submit">
    </form>
  </main>

  <script>
    function validate() {
      if (document.myform.usrnm.value.trim() == "") {
        alert("Please put your email");
        document.myform.usrnm.focus();
        return false;
      }
      if (document.myform.pswd.value.trim() == "") {
        alert("Please enter a password");
        document.myform.pswd.focus();
        return false;
      }
      var x = document.myform.usrnm.value;
      var atposition = x.indexOf("@");
      var dotposition = x.lastIndexOf(".");
      if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
        alert("Please enter a valid e-mail address");
        return false;

      } else {
        return true;
      }
    }
  </script>

</body>

</html>