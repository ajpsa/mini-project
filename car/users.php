<?php 
include 'db2.php';
session_start();
if ($_SESSION['login_admin'] == "") {
    header("location:index.php");
}

$result=mysqli_query($con,"SELECT * FROM `users` join role_db on users.role_id=role_db.role_id");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Users detail</title>
    <style>
        h3{
            font-family: "Raleway", Helvetica, sans-serif;
        }
        a{
          text-decoration:none;
        }
        .card-detail{
            background-color: rgb(240, 74, 56);
            font-family: verdana;
            width:350px;
            padding:3px;
            color:white;
        }
        .card-detail-two{
            font-family: verdana;
            width:350px;
            margin-top:-30px;
            padding:3px;
            background:white;
        }
        .blah{
            margin-right:20px;
        }
            input[type=reset] {
            width: 80px;
            background-color: #ff3939;
            color: white;
            padding: 10px;
            margin: 4px 0 20px 120px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
  }
        </style></style>
</head>
<body>
<?php include 'side.php';?>

<div class="common-div">    
<h3>Users detail</h3>
<div id="block_container">
<?php 
            $count=0;
            while ($row = mysqli_fetch_assoc($result)) {  ?>
            
<div class="blah">
<div class="card-detail">
<h3 style="margin-left:10px;"><?php echo $row['fname'];?></h3>
<p style="margin-top:-12px; margin-left:10px;">User</p>
</div>
<div class="card-detail-two">
<p style="margin-left:10px; margin-bottom:-10px;">Phone: <?php echo $row['phone'];?></p><br>
<p style="margin-left:10px; margin-bottom:-10px;">Email: <?php echo $row['email'];?></p><br>
<p style="margin-bottom:-5px; margin-left:10px;">Place: <?php echo $row['place'];?></p><br>

<?php if($row['status']==0) { ?>
    <p><a href="user_status.php?s_id=<?php echo $row['role_id']; ?>&&status=0"><input type="submit" value="Unblock"></a></p>
<?php
}
else {
    ?>
    <p><a href="user_status.php?s_id=<?php echo $row['role_id']; ?>&&status=1"><input type="reset" value="Block"></a></p>
<?php
}
?>

</div></div>
<?php } ?>
</div></div>
</body>
</html>