<?php
include 'db2.php';
session_start();
if ($_SESSION['login_admin'] == "") {
    header("location:index.php");
}

$result = mysqli_query($con, "SELECT * FROM `worker_registration_db` join role_db on worker_registration_db.role_id=role_db.role_id WHERE role_db.status=1 or role_db.status=0" );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="car.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Workers detail</title>
    <style>
        h3 {
            font-family: "Raleway", Helvetica, sans-serif;
        }

        a {
            text-decoration: none;

        }

        .card-detail {
            background-color: rgb(240, 74, 56);
            font-family: verdana;
            width: 350px;
            padding: 3px;
            color: white;
        }

        .card-detail-two {
            font-family: verdana;
            width: 350px;
            margin-top: -30px;
            padding: 3px;
            background: white;
        }

        .blah {
            margin-right: 20px;
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
    </style>
</head>

<body>
    <?php include 'side.php'; ?>

    <div class="common-div">
        <h3>Worker detail</h3>
        <div id="block_container">
            <?php
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {  ?>

                <div class="blah">
                    <div class="card-detail">
                        <h3 style="margin-left:10px;"><?php echo $row['w_name']; ?></h3>
                        <p style="margin-top:-12px; margin-left:10px;">Worker</p>
                    </div>
                    <div class="card-detail-two">
                        <p style="margin-left:10px; margin-bottom:-25px;">Phone: <?php echo $row['w_phone']; ?></p><br>
                        <p style="margin-bottom:-25px; margin-left:10px;">Email: <?php echo $row['email']; ?></p><br>
                        <p style="margin-bottom:-25px; margin-left:10px;">Place: <?php echo $row['w_place']; ?></p><br>
                        <p style="margin-bottom:-5px; margin-left:10px;">Service: <?php echo $row['worker_service']; ?></p><br>
                        <br>
                        <a href="edit_worker.php?s_id=<?php echo $row['role_id']; ?>">
                        <input type="button" value="Edit" name="btn_add"></a>
                        


                        <?php if ($row['status'] == 0) { ?>
                            <a href="worker_status.php?s_id=<?php echo $row['role_id']; ?>&&status=0">
                                <input type="submit" value="Unblock" style="margin-left: 80px;"></a>
                        <?php
                        } else {
                        ?>
                            <a href="worker_status.php?s_id=<?php echo $row['role_id']; ?>&&status=1">
                                <input type="reset" value="Block"  style="margin-left: 80px;"></a>
                        <?php
                        }
                        ?> 
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>